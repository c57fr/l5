<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller {

  public function create() {
    
    return view('registration.create');
  }


  public function store() {

    // Validr le formulaire
    $this->validate(request(), [
      'username' => 'required|min:2',
      'email'    => 'required|email',
      'password' => 'required|confirmed|min:2'
    ]);

    // Créer et sauvegarder l'user.
    $user = User::create([
                           'username' => request('username'),
                           'email'    => request('email'),
                           'password' => bcrypt(request('password'))
                         ]);

    // Login l'user
    auth()->login($user);

    // Redirection à la page d'acceuil.
    return redirect()->home();
  }
}
