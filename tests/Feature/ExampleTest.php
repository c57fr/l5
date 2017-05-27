<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase {

  /**
   * A basic test example.
   *
   * @return void
   */
  public function testBasicTest() {

    // Appel en console avec: phpunit tests/Feature/ExampleTest.php
    // Possible aussi avec commande: vendor/bin/phpunit ...
    // Décommenter les 2 lignes ci-dessous pour activer cet exemple de test
    // dont le but est juste de voir si on obtient une réponse normale de l'URL '/'
    //        $response = $this->get('/');
    //        $response->assertStatus(200);

    // Test si on trouve le mot news dans la page
    //    $this->get('/')
    //         ->assertSee('news');

    // Attention: Tien compte de la casse
    $this->get('/about')
         ->assertSee('COTE'); // Résultat OK
    // ->assertSee('COTE'); // Laissera croire à une erreur
  }
}
