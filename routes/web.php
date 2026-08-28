<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Lang switcher
Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'fr'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('lang.switch');

Auth::routes(['register' => false]);
Route::group(['middleware' => ['guest']], function () {
    Route::get('/', function () {
        return view('auth/login');
    });
});


Route::group(['middleware' => ['auth', 'is_user']], function () {
    Route::get('/dashboard', 'FicheController@index')->name('user.dashboard');
    Route::resource('fiches', 'FicheController');

    Route::get('/fiches/{id}/vigueur/create', 'FicheController@createVigueur')->name('fiches.vigueur.create');
    Route::post('/fiches/{id}/vigueur/store', 'FicheController@storeVigueur')->name('fiches.vigueur.store');
    Route::get('/fiches/{idMaster}/vigueur/{id}/edit', 'FicheController@editVigueur')->name('fiches.vigueur.edit');
    Route::patch('/fiches/{idMaster}/vigueur/{id}/update', 'FicheController@updateVigueur')->name('fiches.vigueur.update');
    Route::delete('/fiches/{idMaster}/vigueur/{id}/delete', 'FicheController@destroyVigueur')->name('fiches.vigueur.delete');

    Route::patch('/fiches/{idMaster}/updateAffichageVigueur', 'FicheController@updateAffichageVigueur')->name('fiches.updateAffichageVigueur');

    Route::get('/fiches/{id}/vendu/create', 'FicheController@createVendu')->name('fiches.vendu.create');
    Route::post('/fiches/{id}/vendu/store', 'FicheController@storeVendu')->name('fiches.vendu.store');
    Route::get('/fiches/{idMaster}/vendu/{id}/edit', 'FicheController@editVendu')->name('fiches.vendu.edit');
    Route::patch('/fiches/{idMaster}/vendu/{id}/update', 'FicheController@updateVendu')->name('fiches.vendu.update');
    Route::delete('/fiches/{idMaster}/vendu/{id}/delete', 'FicheController@destroyVendu')->name('fiches.vendu.delete');

    Route::get('/fiches/{id}/annexe/create', 'FicheController@createAnnexe')->name('fiches.annexe.create');
    Route::post('/fiches/{id}/annexe/store', 'FicheController@storeAnnexe')->name('fiches.annexe.store');
    Route::get('/fiches/{idMaster}/annexe/{id}/edit', 'FicheController@editAnnexe')->name('fiches.annexe.edit');
    Route::patch('/fiches/{idMaster}/annexe/{id}/update', 'FicheController@updateAnnexe')->name('fiches.annexe.update');
    Route::delete('/fiches/{idMaster}/annexe/{id}/delete', 'FicheController@destroyAnnexe')->name('fiches.annexe.delete');

    Route::get('/fiches/{id}/download', 'FicheController@downloadPDF')->name('fiches.download');

    // Route AJAX pour générer les images de prévisualisation en temps réel
    Route::post('/fiches/generate-preview-images', 'FicheController@generatePreviewImages')->name('fiches.generate-preview-images');
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('profile', 'ProfileController');
    Route::post('crop-image', ['as' => 'croppie.upload-image', 'uses' => 'UserController@imageCrop']);
});


Route::group(['middleware' => ['auth', 'is_admin']], function () {
    Route::get('admin/home', 'HomeController@adminHome')->name('admin.home');
    Route::resource('admin/users', 'UserController');
});