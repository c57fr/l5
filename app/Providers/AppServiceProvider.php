<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot() {

    Schema::defaultStringLength(191);

    view()->composer('partials.sidebar', function ($view) {

      $view->with('archives', \App\Article::archives());
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
