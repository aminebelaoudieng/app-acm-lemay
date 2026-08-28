<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Session;
use Intervention\Image\Facades\Image;
use App\User;
use DB;
use Hash;
use Arr;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id', 'DESC')->paginate(25);
        return view('admin.users.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * 25);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $nextId = DB::table('users')->max('id') + 1;
        if (Session::has('errors')) {
            $photo = (file_exists(public_path() . '/uploads/users/' . md5($nextId ?? '') . '.png')) ? asset('uploads/users/' . md5($nextId ?? '') . '.png') : '';
        } else {
            $photo = '';
        }

        return view('admin.users.create')->with(['nextId' => $nextId, 'photo' => $photo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);



        if (empty($input['design_sans_plus'])) {
            $input['design_sans_plus'] = 0;
        }
        if (empty($input['is_admin'])) {
            $input['is_admin'] = 0;
        }

        // Gérer les champs multilingues pour poste et slogan
        if (!isset($input['poste_en'])) {
            $input['poste_en'] = null;
        }
        if (!isset($input['slogan_en'])) {
            $input['slogan_en'] = null;
        }

        $user = User::create($input);

        // Traitement de la photo uploadée via croppie
        if (isset($input['photo_data'])) {
            $this->processPhotoData($input['photo_data'], $user->id);
            unset($input['photo_data']);
        }

        if (isset($input['image_header'])) {
            $this->imageHeaderCrop($request, 'image_header');
            unset($input['image_header']);
        } else if (isset($input['image_header_old'])) {
            $input['image_header'] =  ($input['image_header_old']=="delete")?null:$input['image_header_old'];
        }

        if (isset($input['logo_header'])) {
            $this->logoCrop($request, 'logo_header');
            unset($input['logo_header']);
        } else if (isset($input['logo_header_old'])) {
            $input['logo_header'] =  ($input['logo_header_old']=="delete")?null:$input['logo_header_old'];
        }
        
        if (isset($input['logo_footer'])) {
            $this->logoCrop($request, 'logo_footer');
            unset($input['logo_footer']);
        } else if (isset($input['logo_footer_old'])) {
            $input['logo_footer'] =  ($input['logo_footer_old']=="delete")?null:$input['logo_footer_old'];
        }

        return redirect()->back()->with('success', 'Utilisateur créé.');
    }

    /**
     * Process photo data from croppie for user creation
     *
     * @param  string  $photoData
     * @param  int  $userId
     * @return void
     */
    private function processPhotoData($photoData, $userId)
    {
        list($type, $photoData) = explode(';', $photoData);
        list(, $photoData) = explode(',', $photoData);
        $photoData = base64_decode($photoData);
        $image_name = md5($userId) . '.png';
        $path = public_path('uploads/users/' . $image_name);

        file_put_contents($path, $photoData);
        $v = time();
        $user = User::find($userId);
        if ($user) {
            $user->update(['photo' => $image_name . '?v=' . $v]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.delete', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        if (isset($user->photo)) {
            $photo = asset('uploads/users/' . $user->photo);
        } else {
            $photo = (file_exists(public_path() . '/uploads/users/' . md5($nextId ?? '') . '.png')) ? asset('uploads/users/' . md5($nextId ?? '') . '.png') : '';
        }

        return view('admin.users.edit')->with(['user' => $user, 'photo' => $photo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input =  Arr::except($input, array('password'));
        }

        if (isset($input['logo_header'])) {
            $this->logoCrop($request, 'logo_header');
            unset($input['logo_header']);
        } else if (isset($input['logo_header_old'])) {
            $input['logo_header'] =  ($input['logo_header_old']=="delete")?null:$input['logo_header_old'];
        }

        if (isset($input['image_header'])) {
            $this->imageHeaderCrop($request, 'image_header');
            unset($input['image_header']);
        } else if (isset($input['image_header_old'])) {
            $input['image_header'] =  ($input['image_header_old']=="delete")?null:$input['image_header_old'];
        }
        if (isset($input['logo_footer'])) {
            $this->logoCrop($request, 'logo_footer');
            unset($input['logo_footer']);
        } else if (isset($input['logo_footer_old'])) {
            $input['logo_footer'] =  ($input['logo_footer_old']=="delete")?null:$input['logo_footer_old'];
        }


        if (empty($input['design_sans_plus'])) {
            $input['design_sans_plus'] = 0;
        }
        if (empty($input['is_admin'])) {
            $input['is_admin'] = 0;
        }

        // Gérer les champs multilingues pour poste et slogan
        if (!isset($input['poste_en'])) {
            $input['poste_en'] = null;
        }
        if (!isset($input['slogan_en'])) {
            $input['slogan_en'] = null;
        }

        $user = User::find($id);
        $user->update($input);

        return redirect()->back()->with('success', 'Mise à jour réussie.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user =   User::find($id);

        $photo = public_path('uploads/users/' . explode('?v=', $user->photo)[0]);
        if (File::exists($photo)) {
            File::delete($photo);
        }

        $photo = public_path('uploads/users/logos/header/' . explode('?v=', $user->logo_header)[0]);
        if (File::exists($photo)) {
            File::delete($photo);
        }

        $photo = public_path('uploads/users/images/header/' . explode('?v=', $user->_header)[0]);
        if (File::exists($photo)) {
            File::delete($photo);
        }

        $photo = public_path('uploads/users/logos/footer/' . explode('?v=', $user->logo_footer)[0]);
        if (File::exists($photo)) {
            File::delete($photo);
        }


        $user->delete();
        return Redirect::to(route("admin.home"));
    }

    public function imageCrop(Request $request)
    {
        $user_id = ($request->user_id) ? $request->user_id : Auth::user()->id;

        $image_file = $request->image;

        list($type, $image_file) = explode(';', $image_file);
        list(, $image_file)      = explode(',', $image_file);
        $image_file = base64_decode($image_file);
        $image_name = md5($user_id) . '.png';
        $path = public_path('uploads/users/' . $image_name);

        file_put_contents($path, $image_file);
        $v = time();
        $user = User::find($user_id);
        if ($user) {
            $user->update(['photo' => $image_name . '?v=' . $v]);
        }
        return response()->json(['status' => true, 'file' => $image_name . '?v=' . $v]);
    }

    public function logoCrop(Request $request, $type)
    {
        $user_id = ($request->user_id) ? $request->user_id : Auth::user()->id;

        $input = $request->all();
        $image_file = $input[$type];

        $image_name =  md5($user_id) . ".png";
        $path_file  = 'uploads/users/logos/';
        $path_file  .= ($type == "logo_header") ? "header" : "footer";
        $path_file  .= "/" . $image_name;

        $path = public_path($path_file);

        $test = Image::make($image_file->getRealPath())->fit(500, 500)->save($path);


        $v = time();
        $user = User::find($user_id);

        if ($user) {
            $user->update([$type => $image_name . '?v=' . $v]);
        }
    }


    public function imageHeaderCrop(Request $request, $type)
    {
        $user_id = ($request->user_id) ? $request->user_id : Auth::user()->id;
        $input = $request->all();
        $image_file = $input[$type];

        $image_name =  md5($user_id) . ".png";
        $path_file  = 'uploads/users/images/header/';
        $path_file  .= "/" . $image_name;

        $path = public_path($path_file);

        $test = Image::make($image_file->getRealPath())->resize(600, 600, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($path);

        $v = time();
        $user = User::find($user_id);

        if ($user) {
            $updated =  $user->update([$type => $image_name . '?v=' . $v]);
        }
    }
}
