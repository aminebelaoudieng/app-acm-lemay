<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

use App\Fiche;
use App\Annexe;
use Arr;
use Auth;
use Storage;
use PDF;
use LynX39\LaraPdfMerger\Facades\PdfMerger;
use Symfony\Component\Filesystem\Filesystem;
use Xthiago\PDFVersionConverter\Converter\GhostscriptConverterCommand;
use Xthiago\PDFVersionConverter\Converter\GhostscriptConverter;
use Xthiago\PDFVersionConverter\Guesser\RegexGuesser;

use Intervention\Image\Facades\Image;

class FicheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
   {
    $user = Auth::user();
    $fiches = $user->fichesMaster;

    $search = $request->input('search');
    if ($search !== null && $search !== '') {
        $fiches = $fiches->filter(function ($fiche) use ($search) {
            return stripos($fiche->adresse, $search) !== false; // Recherche insensible à la casse
        });
    }

    $fiches = $fiches->sortByDesc('created_at'); // Trier du plus récent au plus ancien

    return view('users.fiches.index', compact('fiches'));
   }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('users.fiches.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createVigueur($id)
    {

        $ficheMaster = Fiche::find($id);

        //TODO: Validate godd fiche belong to user

        return view('users.fiches.vigueur.create', compact('ficheMaster'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createVendu($id)
    {

        $ficheMaster = Fiche::find($id);

        //TODO: Validate godd fiche belong to user

        return view('users.fiches.vendu.create', compact('ficheMaster'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAnnexe($id)
    {

        $ficheMaster = Fiche::find($id);

        //TODO: Validate godd fiche belong to user

        return view('users.fiches.annexe.create', compact('ficheMaster'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'adresse' => 'required',
    //     ]);


    //     $user = Auth::user();

    //     $input = $request->all();
    //     if (empty($input['use_moyenne_prix_pi2'])) {
    //         $input['use_moyenne_prix_pi2'] = 0;
    //     }
    //     $input['user_id'] = $user->id;
    //     $input['type'] = "master";
    //     $fiche = Fiche::create($input);

    //     if (isset($input['photo_custom'])) {
    //         $image_file = $input['photo_custom'];
    //         request()->validate([
    //             'photo_custom' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         ]);
    //         $imageName =  md5($fiche->id) . ".png";
    //         $path = public_path('uploads/streetview/') . $imageName;

    //         Image::make($image_file->getRealPath())->fit(640, 500)->save($path);

    //         $this->create_map_images($fiche, true);
    //     } else if (isset($input['update_streetView']) && $input['update_streetView'] == 1) {
    //         $this->create_map_images($fiche);
    //     }

    //     return redirect()->route('fiches.edit', $fiche->id)->with('success', 'Nouvelle fiche créée.');
    // }



public function store(Request $request)
{
    $this->validate($request, [
        'adresse' => 'required',
    ]);

    $user = Auth::user();

    $input = $request->all();
    if (empty($input['use_moyenne_prix_pi2'])) {
        $input['use_moyenne_prix_pi2'] = 0;
    }
    $input['user_id'] = $user->id;
    $input['type'] = "master";

    \Log::debug('Début création de fiche. Adresse : ' . ($input['adresse'] ?? 'Aucune'));

    if (!empty($input['adresse'])) {
        $adresse = $input['adresse'];
        $gmap_key = env('GMAP_KEY');
        $adresse_encoded = urlencode($adresse);
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$adresse_encoded}&key={$gmap_key}";

        \Log::debug("Appel API Geocoding : " . $url);

        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);

            $json = json_decode($response, true);

            if ($json && isset($json['results'][0])) {
                $lat = $json['results'][0]['geometry']['location']['lat'];
                $lng = $json['results'][0]['geometry']['location']['lng'];

                $input['map_lat'] = $lat;
                $input['map_lng'] = $lng;
                $input['map_zoom'] = 14;

                $input['street_lat'] = $lat;
                $input['street_lng'] = $lng;
                $input['street_zoom'] = 1;
                $input['street_heading'] = 0;
                $input['street_pitch'] = 0;

                \Log::debug("Coordonnées géocodées : lat={$lat}, lng={$lng}");
            } else {
                \Log::error("Erreur API Geocoding : " . json_encode($json));
            }
        } catch (\Exception $e) {
            \Log::error("Erreur appel API Geocoding : " . $e->getMessage());
        }
    } else {
        \Log::warning("Aucune adresse fournie pour géocodage.");
    }

    $fiche = Fiche::create($input);

    if (isset($input['photo_custom'])) {
        $image_file = $input['photo_custom'];
        request()->validate([
            'photo_custom' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $imageName =  md5($fiche->id) . ".png";
        $path = public_path('uploads/streetview/') . $imageName;

        Image::make($image_file->getRealPath())->fit(640, 500)->save($path);

        $this->create_map_images($fiche, true);
    } else if (isset($input['update_streetView']) && $input['update_streetView'] == 1) {
        $this->create_map_images($fiche);
    }

    // Rediriger vers la page d'édition avec l'onglet "Sujet principale" actif
    return redirect()->route('fiches.edit', $fiche->id)->with('success', __('fiches.created'))->with('active_tab', 'general');
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeVigueur($master_id, Request $request)
    {

        $master = Fiche::find($master_id);

        //TODO: Master belong to user

        $this->validate($request, [
            'adresse' => 'required',
            'ville' => 'required',
            'province' => 'required',
            'numero_civic' => 'required',
            'rue' => 'required',
            'code_postal' => 'required',
            'comparable_vigueur_prix_demande' => 'required',
            'comparable_vigueur_date_vente' => 'required',
            'caracteristique_annee_construction' => 'required',
            'caracteristique_superficie_habitable' => 'required',
            'caracteristique_etage' => 'required',
        ]);


        $user = Auth::user();

        $input = $request->all();
        $input['user_id'] = $user->id;
        $input['type'] = "vigueur";
        $fiche = Fiche::create($input);

        $master->fichesVigueur()->attach($fiche);
        if (isset($input['photo_custom'])) {
            $image_file = $input['photo_custom'];

            request()->validate([
                'photo_custom' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $imageName =  md5($fiche->id) . ".png";
            $path = public_path('uploads/streetview/') . $imageName;

            $test = Image::make($image_file->getRealPath())->fit(640, 500)->save($path);

            $this->create_map_images($fiche, true);
        } else if (isset($input['update_streetView']) && $input['update_streetView'] == 1) {
            $this->create_map_images($fiche);
        }

        return Redirect::to(route("fiches.edit", $master->id) . "#vigueur");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeVendu($master_id, Request $request)
    {

        $master = Fiche::find($master_id);
        //TODO: Master belong to user

        $this->validate($request, [
            'adresse' => 'required',
            'ville' => 'required',
            'province' => 'required',
            'numero_civic' => 'required',
            'rue' => 'required',
            'code_postal' => 'required',
            'comparable_vendu_prix_demande' => 'required',
            'comparable_vendu_prix_vente' => 'required',
            'comparable_vendu_date_vente' => 'required',
            'comparable_vendu_delais_vente' => 'required',
            'caracteristique_annee_construction' => 'required',
            'caracteristique_superficie_habitable' => 'required',
            'caracteristique_etage' => 'required',
        ]);


        $user = Auth::user();

        $input = $request->all();
        $input['user_id'] = $user->id;
        $input['type'] = "vendu";
        $fiche = Fiche::create($input);

        $master->fichesVendu()->attach($fiche);
        if (isset($input['photo_custom'])) {
            $image_file = $input['photo_custom'];
            request()->validate([
                'photo_custom' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $imageName =  md5($fiche->id) . ".png";
            $path = public_path('uploads/streetview/') . $imageName;

            $test = Image::make($image_file->getRealPath())->fit(640, 500)->save($path);

            $this->create_map_images($fiche, true);
        } else if (isset($input['update_streetView']) && $input['update_streetView'] == 1) {
            $this->create_map_images($fiche);
        }

        return Redirect::to(route("fiches.edit", $master->id) . "#vendu");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAnnexe($master_id, Request $request)
    {

        $master = Fiche::find($master_id);
        if (!$this->isValideOwnership($master)) {
            return redirect(route('user.dashboard'))->with('error', "You don't have admin access.");
        }
        $this->validate($request, [
            'name' => 'required',
            'file' => 'required|mimes:pdf|mimetypes:application/pdf|max:10240',
        ], [
            'file.mimes' => __('fiches_subtabs.only_pdf_allowed'),
            'file.mimetypes' => __('fiches_subtabs.only_pdf_allowed'),
            'file.max' => __('fiches_subtabs.file_too_large', ['size' => '10MB']),
        ]);


        $user = Auth::user();

        $input = $request->all();
        $input['user_id'] = $user->id;
        $input['fiche_id'] = $master->id;
        $annexe = Annexe::create($input);

        $this->create_pdf_annexe($annexe, $request);

        // If request expects JSON (AJAX upload), return JSON response so frontend can show progress/result
        if ($request->ajax() || $request->wantsJson()) {
            $fileLink = $annexe->file ? asset('uploads/annexes/' . $annexe->file) : null;
            return response()->json([
                'success' => true,
                'message' => __('fiches.annexe_uploaded', [], app()->getLocale()),
                'annexe' => [
                    'id' => $annexe->id,
                    'name' => $annexe->name,
                    'fileName' => $annexe->file,
                    'fileLink' => $fileLink,
                ],
            ]);
        }

        return Redirect::to(route("fiches.edit", $master->id) . "#annexe");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fiche = Fiche::find($id);
        if (!$this->isValideOwnership($fiche)) {
            return redirect(route('user.dashboard'))->with('error', "You don't have admin access.");
        }

        $fichesVigueur = $fiche->fichesVigueur()->get();
        $fichesVendu = $fiche->fichesVendu()->get();
        $annexes = $fiche->annexes;
      
        return view('users.fiches.edit', compact('fiche', 'fichesVigueur', 'fichesVendu', 'annexes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editVigueur($master_id, $id)
    {

        $ficheMaster = Fiche::find($master_id);
        if (!$this->isValideOwnership($ficheMaster)) {
            return redirect(route('user.dashboard'))->with('error', "You don't have admin access.");
        }
        $fiche = Fiche::find($id);
        if (!$this->isValideOwnership($fiche)) {
            return redirect(route('user.dashboard'))->with('error', "You don't have admin access.");
        }
        return view('users.fiches.vigueur.edit', compact('ficheMaster', 'fiche'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editVendu($master_id, $id)
    {
        $ficheMaster = Fiche::find($master_id);
        if (!$this->isValideOwnership($ficheMaster)) {
            return redirect(route('user.dashboard'))->with('error', "You don't have admin access.");
        }
        $fiche = Fiche::find($id);
        if (!$this->isValideOwnership($fiche)) {
            return redirect(route('user.dashboard'))->with('error', "You don't have admin access.");
        }
        
        return view('users.fiches.vendu.edit', compact('ficheMaster', 'fiche'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editAnnexe($master_id, $id)
    {
        $ficheMaster = Fiche::find($master_id);
        if (!$this->isValideOwnership($ficheMaster)) {
            return redirect(route('user.dashboard'))->with('error', "You don't have admin access.");
        }
        $annexe = Annexe::find($id);
        if (!$this->isValideOwnership($annexe)) {
            return redirect(route('user.dashboard'))->with('error', "You don't have admin access.");
        }

        return view('users.fiches.annexe.edit', compact('ficheMaster', 'annexe'));
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAffichageVigueur(Request $request, $id)
    {
     
        $input = $request->all();
        if (empty($input['ne_pas_afficher_les_vigueurs'])) {
            $input['ne_pas_afficher_les_vigueurs'] = 0;
        }
        $fiche = Fiche::find($id);
    
        $fiche->update($input);
        return Redirect::to(route("fiches.edit", $fiche->id) . "#vigueur");
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
            'adresse' => 'required',
            'caracteristique_superficie_habitable' => 'required',
            'evaluation_terrain' => 'required',
            'evaluation_batiment' => 'required',
            'date' => 'required',
            'but' => 'required',
            'periode' => 'required',
        ]);
        
       
        $input = $request->all();
        if (empty($input['use_moyenne_prix_pi2'])) {
            $input['use_moyenne_prix_pi2'] = 0;
        }
        $fiche = Fiche::find($id);
        if (!$this->isValideOwnership($fiche)) {
            return redirect(route('user.dashboard'))->with('error', "You don't have admin access.");
        }


        if (isset($input['photo_custom'])) {
            $image_file = $input['photo_custom'];
            request()->validate([
                'photo_custom' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $imageName =  md5($fiche->id) . ".png";
            $path = public_path('uploads/streetview/') . $imageName;

            $test = Image::make($image_file->getRealPath())->fit(640, 500)->save($path);

            $this->create_map_images($fiche, true);
        } else if (isset($input['update_streetView']) && $input['update_streetView'] == 1) {
            $this->create_map_images($fiche);
        }


        $fiche->update($input);

        // Récupérer l'onglet actif depuis la requête
        $activeMainTab = $request->input('active_main_tab', 'general');
        $activeSubTab = $request->input('active_sub_tab');

        // Construire l'URL avec l'onglet actif
        $redirectUrl = route('fiches.edit', $fiche->id);
        if ($activeMainTab && $activeMainTab !== 'general') {
            $redirectUrl .= '#' . $activeMainTab;
        }

    $redirectResponse = redirect($redirectUrl)->with('success', __('fiches.update_success'));

        // Ajouter l'onglet actif à la session pour le JavaScript
        if ($activeMainTab) {
            $redirectResponse->with('active_tab', $activeMainTab);
        }
        if ($activeSubTab) {
            $redirectResponse->with('active_sub_tab', $activeSubTab);
        }

        return $redirectResponse;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateVigueur(Request $request, $master_id, $id)
    {

        $this->validate($request, [
            'adresse' => 'required',
            'ville' => 'required',
            'province' => 'required',
            'numero_civic' => 'required',
            'rue' => 'required',
            'code_postal' => 'required',
            'comparable_vigueur_prix_demande' => 'required',
            'comparable_vigueur_date_vente' => 'required',
            'caracteristique_annee_construction' => 'required',
            'caracteristique_superficie_habitable' => 'required',
            'caracteristique_etage' => 'required',
        ]);

        $input = $request->all();

        $fiche = Fiche::find($id);
        if (!$this->isValideOwnership($fiche)) {
            return redirect(route('user.dashboard'))->with('error', "You don't have admin access.");
        }

        $fiche->update($input);
        if (isset($input['photo_custom'])) {
            $image_file = $input['photo_custom'];

            request()->validate([
                'photo_custom' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $imageName =  md5($fiche->id) . ".png";
            $path = public_path('uploads/streetview/') . $imageName;

            $test = Image::make($image_file->getRealPath())->fit(640, 500)->save($path);

            $this->create_map_images($fiche, true);
        } else if (isset($input['update_streetView']) && $input['update_streetView'] == 1) {
            $this->create_map_images($fiche);
        }


    return redirect()->to(url()->previous() . '#vigueur')->with('success', __('fiches.update_success'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateVendu(Request $request, $master_id, $id)
    {

        $this->validate($request, [
            'adresse' => 'required',
            'ville' => 'required',
            'province' => 'required',
            'numero_civic' => 'required',
            'rue' => 'required',
            'code_postal' => 'required',
            'comparable_vendu_prix_demande' => 'required',
            'comparable_vendu_prix_vente' => 'required',
            'comparable_vendu_date_vente' => 'required',
            'comparable_vendu_delais_vente' => 'required',
            'caracteristique_annee_construction' => 'required',
            'caracteristique_superficie_habitable' => 'required',
            'caracteristique_etage' => 'required',
        ]);

        $input = $request->all();

        $fiche = Fiche::find($id);
        if (!$this->isValideOwnership($fiche)) {
            return redirect(route('user.dashboard'))->with('error', "You don't have admin access.");
        }
        $fiche->update($input);
        if (isset($input['photo_custom'])) {
            $image_file = $input['photo_custom'];
            request()->validate([
                'photo_custom' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $imageName =  md5($fiche->id) . ".png";
            $path = public_path('uploads/streetview/') . $imageName;

            $test = Image::make($image_file->getRealPath())->fit(640, 500)->save($path);

            $this->create_map_images($fiche, true);
        } else if (isset($input['update_streetView']) && $input['update_streetView'] == 1) {
            $this->create_map_images($fiche);
        }



    return redirect()->to(url()->previous() . '#vendu')->with('success', __('fiches.update_success'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAnnexe(Request $request, $master_id, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'file' => 'required|mimes:pdf|mimetypes:application/pdf|max:10240',
        ], [
            'file.mimes' => __('fiches_subtabs.only_pdf_allowed'),
            'file.mimetypes' => __('fiches_subtabs.only_pdf_allowed'),
            'file.max' => __('fiches_subtabs.file_too_large', ['size' => '10MB']),
        ]);

        $input = $request->all();

        $annexe = Annexe::find($id);
        if (!$this->isValideOwnership($annexe)) {
            return redirect(route('user.dashboard'))->with('error', "You don't have admin access.");
        }
        $annexe->update($input);
        $this->create_pdf_annexe($annexe, $request);

    return redirect()->to(url()->previous() . '#annexe')->with('success', __('fiches.update_success'));
    }

    public function isValideOwnership($fiche)
    {
        if (!isset($fiche->user_id)) {
            return false;
        }
        if (Auth::user()->id != $fiche->user_id) {
            return false;
        } else {
            return true;
        }
    }
    
    private function curl_get_file_contents($URL)
    {
        $c = curl_init();
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_URL, $URL);
        $contents = curl_exec($c);
        curl_close($c);
    
        if ($contents) return $contents;
        else return FALSE;
    }


    private function create_map_images($fiche, $photo_custom = false)
    {
        $url = "https://maps.googleapis.com/maps/api/staticmap?center" . $fiche->map_lat . "," . $fiche->map_lng . "&zoom=" . $fiche->map_zoom . "&size=800x500&maptype=roadmap&markers=color:red%7C" . $fiche->map_lat . "," . $fiche->map_lng . "&key=" . env('GMAP_KEY');

        $image_file = $this->curl_get_file_contents($url);
        $name = md5($fiche->id) . ".png";
        $path = public_path('uploads/maps/' . $name);
        file_put_contents($path, $image_file);


        $zoom = (4 - $fiche->street_zoom) * 30;
        if (!$photo_custom) {
            $url = "https://maps.googleapis.com/maps/api/streetview?size=800x500&location=" . $fiche->street_lat . "," . $fiche->street_lng . "&fov=" . $zoom . "&heading=" . $fiche->street_heading . "&pitch=" . $fiche->street_pitch  . "&key=" . env('GMAP_KEY');

            $image_file = $this->curl_get_file_contents($url);
            $name = md5($fiche->id) . ".png";
            $path = public_path('uploads/streetview/' . $name);
            file_put_contents($path, $image_file);
        }
    }


    private function create_pdf_annexe($annexe, $request)
    {

        $pdf_name =  md5($annexe->id) . '.' . $request->file('file')->getClientOriginalExtension();
        $path = public_path('uploads/annexes/');
        $request->file('file')->move($path, $pdf_name);
        $annexe->file = $pdf_name;

        $guesser = new RegexGuesser();
        $version = $guesser->guess($path . "/" . $pdf_name); // will print something like '1.4'

        if ($version >= 1.3) {
            $command = new GhostscriptConverterCommand();
            $filesystem = new Filesystem();

            $converter = new GhostscriptConverter($command, $filesystem);
            $converter->convert($path . "/" . $pdf_name, '1.2');
        }

        $annexe->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fiche =   Fiche::find($id);
        if (!$this->isValideOwnership($fiche)) {
            return redirect(route('user.dashboard'))->with('error', "You don't have admin access.");
        }
        $fichesVigueur = $fiche->fichesVigueur()->get();
        $fichesVendu = $fiche->fichesVendu()->get();
        $annexes = $fiche->annexes;
        foreach ($fichesVigueur as $ficheToDelete) :
            $this->destroyVigueur($fiche->id, $ficheToDelete->id);
        endforeach;
        foreach ($fichesVendu as $ficheToDelete) :
            $this->destroyVendu($fiche->id, $ficheToDelete->id);
        endforeach;
        foreach ($annexes as $ficheToDelete) :
            $this->destroyAnnexe($fiche->id, $ficheToDelete->id);
        endforeach;

        $map = public_path('uploads/maps/' . md5($fiche->id) . ".png");
        if (File::exists($map)) {
            File::delete($map);
        }


        $streetview = public_path('uploads/streetview/' . md5($fiche->id) . ".png");
        if (File::exists($streetview)) {
            File::delete($streetview);
        }
        $fiche->delete();
    return redirect()->route("fiches.index")->with('success', __('fiches.deleted'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyVigueur($master_id, $id)
    {
        $fiche =   Fiche::find($id);
        $master = Fiche::find($master_id);

        if (!$this->isValideOwnership($fiche)) {
            return redirect(route('user.dashboard'))->with('error', "You don't have admin access.");
        }

        if (!$this->isValideOwnership($master)) {
            return redirect(route('user.dashboard'))->with('error', "You don't have admin access.");
        }


        $map = public_path('uploads/maps/' . md5($fiche->id) . ".png");
        if (File::exists($map)) {
            File::delete($map);
        }
        $streetview = public_path('uploads/streetview/' . md5($fiche->id) . ".png");
        if (File::exists($streetview)) {
            File::delete($streetview);
        }

        $master->fichesVigueur()->detach($fiche);
        $fiche->delete();
        return Redirect::to(route("fiches.edit", $master->id) . "#vigueur");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyVendu($master_id, $id)
    {
        $fiche =   Fiche::find($id);
        $master = Fiche::find($master_id);
        if (!$this->isValideOwnership($fiche)) {
            return redirect(route('user.dashboard'))->with('error', "You don't have admin access.");
        }

        if (!$this->isValideOwnership($master)) {
            return redirect(route('user.dashboard'))->with('error', "You don't have admin access.");
        }
        $map = public_path('uploads/maps/' . md5($fiche->id) . ".png");
        if (File::exists($map)) {
            File::delete($map);
        }
        $streetview = public_path('uploads/streetview/' . md5($fiche->id) . ".png");
        if (File::exists($streetview)) {
            File::delete($streetview);
        }

        $master->fichesVendu()->detach($fiche);
        $fiche->delete();
        return Redirect::to(route("fiches.edit", $master->id) . "#vendu");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyAnnexe($master_id, $id)
    {
        $annexe =   Annexe::find($id);
        $master = Fiche::find($master_id);
        if (!$this->isValideOwnership($master)) {
            return redirect(route('user.dashboard'))->with('error', "You don't have admin access.");
        }

        if (!$this->isValideOwnership($annexe)) {
            return redirect(route('user.dashboard'))->with('error', "You don't have admin access.");
        }
        $file = public_path('uploads/annexes/' . ($annexe->file));
        if (File::exists($file)) {
            File::delete($file);
        }

        $annexe->delete();
        return Redirect::to(route("fiches.edit", $master->id) . "#annexe");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function downloadPDF($master_id)
    {
        $fiche = Fiche::find($master_id);
        if (!$this->isValideOwnership($fiche)) {
            return redirect(route('user.dashboard'))->with('error', "You don't have admin access.");
        }

        $pdf = PDF::loadView('users.fiches.pdf.index', ['ficheMaster' => $fiche, 'user' => $fiche->user()]);

        $name = md5($master_id) . ".pdf";
        $path = public_path('uploads/tmp/' . $name);
        file_put_contents($path, $pdf->output());


        $final = PDFMerger::init();

        // Add all the pages of the PDF to merge 
        $final->addPDF(public_path('uploads/tmp/' . $name), 'all');

        $annexes = $fiche->annexes;
        foreach ($annexes as $annexe) {
            $final->addPDF(public_path('uploads/annexes/' . $annexe->file), 'all');
        }

        $pdf = PDF::loadView('users.fiches.pdf.pages.last', ['user' => $fiche->user()]);

        $name = md5($master_id) . "-last.pdf";
        $path = public_path('uploads/tmp/' . $name);
        file_put_contents($path, $pdf->output());
        $final->addPDF(public_path('uploads/tmp/' . $name), 'all');

        $final->merge(); //For a normal merge (No blank page added)


        $final->save("fiche-comparable-" . $master_id . ".pdf", "browser");
        //$final->download("fiche-comparable-" . $master_id . ".pdf", "stream");
        // $final->merge('stream',);

        $first = public_path('uploads/tmp/' . md5($master_id) . ".pdf");
        if (File::exists($first)) {
            File::delete($first);
        }
        $last = public_path('uploads/tmp/' . md5($master_id) . "-last.pdf");
        if (File::exists($last)) {
            File::delete($last);
        }
    }
}
