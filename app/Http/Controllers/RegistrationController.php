<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationForm;

class RegistrationController extends Controller {

  public function create() {
    
    return view('registration.create');
  }


  public function store(RegistrationForm $form) {

    $form->persist();
    // Redirection à la page d'acceuil.
    return redirect()->home();
  }
}
