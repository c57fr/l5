<?php

// Todoli Cf. surcharge class Register (Travaux en cours actuellement) pour
// - Compléter pour envoi email maison
// ( Champs parrain dans register INUTILE: Sous-dmn = Parr...)

// Appel d'un service Provider
//dd(resolve('App\Billing\Stripe'));

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

  return view('welcome');
});


Route::get('about', 'PagesController@about')
     ->name('about');

Route::get('contact', 'PagesController@contact')
     ->name('contact');


Route::get('test', 'PagesController@test')
     ->name('test');


Route::resource('articles', 'ArticlesController');

Route::post('/articles/{article}/comments', 'CommentsController@store')
     ->name('articles.comments');

Route::delete('articles/reset', 'ArticlesController@reset')
     ->name('articles.reset');


Route::get('enregistrer', 'RegistrationController@create')
     ->name('register');
Route::post('enregistrer', 'RegistrationController@store')
     ->name('register.post');

Route::get('entrer', 'SessionsController@create')
     ->name('login');
Route::post('entrer', 'SessionsController@store')
     ->name('login.post');

Route::post('/sortir', 'SessionsController@destroy')
     ->name('logout');

Route::get('passe.oublie', 'SessionsController@passreq')
     ->name('password.request');

//Auth::routes();


Route::get('home', 'HomeController@index')
     ->name('home');


Route::get('tem', 'PagesController@testenvoiemaildepuislocal')
     ->name('tem');
