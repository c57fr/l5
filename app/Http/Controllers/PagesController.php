<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller {

  public function Contact() {

    return view('pages.contact');
  }

  public function About() {

    $me        = new \stdClass();
    $me->first = 'Lionel';
    $me->last  = 'COTE';

    $friends = [
      'Pierre',
      'Paul',
      'Jacques'
    ];
    //    $friends =null;
    
    return view('pages.about', compact('me', 'friends'));
  }
}
