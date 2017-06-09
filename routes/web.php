<?php

// Appel d'un service Provider

//App::bind('App\Billing\Stripe', function () {
//  return new \App\Billing\Stripe(config('services.stripe.secret'));
//}); => Devenu inutile car Stripe instanciée dans AppServiceProvider->register()
//dd(App::make('App\Billing\Stripe'));
//dd(resolve('App\Billing\Stripe'));


// Todoli Cf. Dans surcharge class Register
// - Compléter pour envoi email maison
// ( Champs parrain dans register INUTILE: Sous-dmn = Parr...)


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
Route::get('tableauvuejs', 'PagesController@tableauvuejs')
     ->name('tableauvuejs');

Route::get('vuejs', 'PagesController@vuejs')
     ->name('vuejs');


Route::resource('articles', 'ArticlesController');

Route::post('/articles/{article}/comments', 'CommentsController@store')
     ->name('articles.comments');

Route::delete('articles/reset', 'ArticlesController@reset')
     ->name('articles.reset');


Route::get('/articles/tags/{tag}', 'TagsController@index');


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
