<?php

namespace Tests\Unit;

use App\Article;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase {

  /**
   * A basic test example.
   *
   * @return void
   */
  public function testBasicTest() {

    //        $this->assertTrue(true);

    // Rappel: Ajout de 50 users avec php artisan tinker: factory(App\User::class,50)->create()


    // Pour lancer ce test: Dans console,
    // phpunit tests/Unit/ExampleTest.php
    
    // Given: On donne 2 enregistrements d'articles ajoutés dans ma B dD
    // Et chacun d'entre eux est daté d'un certain mois différent
    // Créé à la date courante
    $premier = factory(Article::class)->create();
    // Créé avec la date du mois dernier
    $second = factory(Article::class)->create([
                                                'created_at' => \Carbon\Carbon::now()
                                                                              ->subMonth()
                                              ]);

    // When: Quand je récupère les articles
    $posts = Article::archives();
    // Then: Alors la réponse doit être dans un format particulier

    $this->assertCount(2, $posts);
  }
}
