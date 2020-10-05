<?php

use App\Http\Controllers\DocteurController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::apiResource('docteurs','DocteurController');
Route::name('api.')->group(function () {
    Route::apiResource('docteurs','DocteurController');
    Route::post('docteurs/ville','DocteurController@SearchByVille')->name('docteur.search.ville');
    Route::post('docteurs/distance','DocteurController@SearchByDistance')->name('docteur.search.distance');

    Route::apiResource('docteurs.timings','JourDeTravailController');

});
Route::name('api.')->group(function () {
    Route::apiResource('specialites','SpecialiteController')->only('index');
    Route::post('specialites/docteurs','DocteurController@SearchBySpecialite')->name('specialite.docteurs');

});
Route::name('api.')->group(function () {
    Route::post('guestPatient','PatientController@storeGuestPatient')->name('guestPatient.storeGuestPatient');

    Route::post('rendezvous','RendezVousController@checkRDV')->name('guestPatient.checkRdv');

    Route::post('docteurs/rendezVous/guestPatient','RendezVousController@storeRDVGuestPatient')->name('docteur.guestPatient.storeRDVGuestPatient');

});
