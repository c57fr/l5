<?php

namespace App\Providers;

use App\Article;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot() {

    // Juste pour version MySQL peu récente pour bon fonctionnement des migrations et seeds
    Schema::defaultStringLength(191);
    

    view()->composer('partials.sidebar', function ($view) {

      $view->with('archives', Article::archives());
    });
  }


  /**
   * Register any application services.
   *
   * @return void
   */
  public function register() {
    //
  }
}
