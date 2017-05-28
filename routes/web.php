<?php

App::singleton('App\Billing\Stripe', function () {

  // NB: Dans .env, ajouter :
  // STRIPE_SECRET = 123456123456zadsa123
  return new \App\Billing\Stripe(config('services.stripe.secret'));
});

//$stripe = resolve('App\Billing\Stripe');


//dd($stripe);



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


Auth::routes();

Route::get('home', 'HomeController@index')
     ->name('home');

Route::get('tem', 'PagesController@testenvoiemaildepuislocal')
     ->name('tem');
     