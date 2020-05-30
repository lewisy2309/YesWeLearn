<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

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

Route::get('/', function () {
    return view('main.home');
})->name('acceuil');

Auth::routes();

Route::get('/logout', function(){
    auth()->logout();
    session()->flush();
    return Redirect::to('/');
})->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/professeur/vueprofil', 'professeurController@index')->name('vueprofilprofesseur');

Route::get('/professeur/creationcours', 'professeurController@create')->name('professeurcreationcours');

Route::post('/professeur/creationenregistrer', 'professeurController@store')->name('professeurenregistrementcours');

Route::get('/professeur/{id}/modifiercours', 'professeurController@edit')->name('professeurmodifiercours');

Route::put('/professeur/{id}/majcours', 'professeurController@update')->name('professeurmajcours');

Route::get('/professeur/{id}/supprimercours', 'professeurController@destroy')->name('professeursupprimercours');


Route::get('professeur/cours/{id}/contenucours', 'contenucoursController@index')->name('contenucoursaccueil');

Route::get('professeur/cours/{id}/contenucours/ajouterchapitre', 'contenucoursController@create')->name('contenucourscreerchapitre');

Route::post('professeur/cours/{id}/contenucours/sauvegarder', 'contenucoursController@store')->name('contenucourscreerchapitreenregistrer');

Route::get('professeur/cours/{id}/contenucours/{chapitre}/edit', 'contenucoursController@edit')->name('contenucoursmodifierchapitre');

Route::put('professeur/cours/{id}/contenucours/{chapitre}/update', 'contenucoursController@update')->name('contenucoursmodifierchapitremaj');

Route::get('professeur/cours/{id}/contenucours/{chapitre}/delete', 'contenucoursController@destroy')->name('contenucourssupprimerchapitre');



Route::get('/professeur/ajouter/examen/enonce', 'ajoutExamenController@index')->name('ajouterenonceexamen');

Route::get('/professeur/ajouter/examen/enonce/creer', 'ajoutExamenController@create')->name('ajouterenonceexamencreer');

Route::post('/professeur/ajouter/examen/enonce/creer/savegarder', 'ajoutExamenController@store')->name('ajouterenonceexamencreersauvegarder');

Route::get('professeur/ajouter/examen/enonce/{id}/delete', 'ajoutExamenController@destroy')->name('supprimerenonceexamen');


