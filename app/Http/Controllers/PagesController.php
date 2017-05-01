<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller {

  public function Contact() {
    $v = RegisterController::class;
    //    $v->validator();

    $messages = [
      'min' => 'Le champs :attribute doit impérativement avoir au moins :min caractères.',
    ];
    $rules    = [
      'name' => 'required|string|min:3',
    ];
    $input    = ['name' => 'ab'];
    $v        = Validator::make($input, $rules, $messages)
                         ->errors()
                         ->all();

    \Debugbar::addMessage($v[0], 'Utilisation du validator');

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
