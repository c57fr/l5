<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Auth;
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
    $this->get('/')
         ->assertSee('news');

    
    // Attention: Tient compte de la casse
    //    $this->get('/about')
    //         ->assertSee('About'); // Résultat OK
    // ->assertSee('ABOUT'); // Laissera croire à une erreur


    // Quand nécessité d'être logué pour le test
    /*
    Auth::loginUsingId(1);
    $this->get('/about')
         ->assertSee('GrCOTE7'); // Résultat OK [À adapter avec votre pseudo, voire le psedo de l'utilisateur 1]
    */
  }
}
