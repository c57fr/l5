<?php
namespace App\Http\Controllers;

use App\C7;
use Debugbar;

class PagesController extends Controller {

  public function Contact() {

    C7::TestUsageValidator();
    return view('pages.contact');
  }


  public function About() {

    $me        = new \stdClass();
    $me->first = 'Lionel';
    $me->last  = 'COTE';
    $friends   = [
      'Pierre',
      'Paul',
      'Jacques'
    ];
    //    $friends =null;
    return view('pages.about', compact('me', 'friends'));
  }


  /**
   * TestLocalEmail
   *
   * @return string
   */
  public function TestEnvoiEmailDepuisLocal() {

    //    debug('Méthode de PagesController');
    //    Debugbar::AddMessage('Méthode de PagesController');
    
    return C7::TestEnvoiEmail();
  }
}