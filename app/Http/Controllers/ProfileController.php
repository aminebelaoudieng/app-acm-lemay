<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rules\MatchOldPassword;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App\User;
use DB;
use Hash;
use Arr;
use Auth;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if (isset($user->photo)) {
            $photo = asset('uploads/users/' . $user->photo);
        } else {
            $photo = '';
        }
        return view('profile.index')->with(['user' => $user, 'photo' => $photo]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = Auth::user()->id;

        $this->validate($request, [
            'current_password' => Rule::requiredIf(function () use ($request) {
                return $request->input('password');
            }, new MatchOldPassword),
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input =  Arr::except($input, array('password'));
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

        $user = User::find($id);


        $user->update($input);

    return redirect()->back()->with('success', __('profile.update_success'));
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
            $updated =  $user->update([$type => $image_name . '?v=' . $v]);
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
