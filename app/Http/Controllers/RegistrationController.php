<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller {

  
  public function create() {
    
    return view('sessions.create');
  }


  public function store() {


    // Valide le formulaire

    $this->validate(request(), [
      'pseudo'   => 'required|min:2',
      'email'    => 'required|email',
      'password' => 'required|min:2'
    ]);

    // Créer et sauvegarder l'user.
    User::create(request([
                           'pseudo',
                           'email',
                           bcrypt('password')
                         ]));

    // Login l'user


    // Redirecte à la page d'acceuil.


  }
}
