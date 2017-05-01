<?php
namespace App\Http\Controllers;

use App\Cg7;
use App\Http\Controllers\Auth\RegisterController;

class PagesController extends Controller {

  public function Contact() {

    Cg7::TestUsageValidator();
    //    return Cg7::TestEnvoiEmailLocal();
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
  public function TestLocalEnvoiEmail() {

    return Cg7::TestEnvoiEmailLocal();
  }
}