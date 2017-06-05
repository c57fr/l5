<?php

namespace App\Providers;

use App\Tag;
use App\Article;
use App\Billing\Stripe;
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


      $archives = Article::archives();
      $tags     = Tag::has('articles')
                     ->pluck('name');

      $view->with(compact('archives', 'tags'));
    });
  }


  /**
   * Register any application services.
   *
   * @return void
   */
  public function register() {

    if ($this->app->environment() !== 'production') {
        $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
    }

    $this->app->singleton(Stripe::class, function () {

      // NB: Dans .env, ajouter :
      // STRIPE_SECRET = 123456123456zadsa123
      return new Stripe(config('services.stripe.secret'));
    });
  }
}
