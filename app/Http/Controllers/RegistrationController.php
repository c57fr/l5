<?php

namespace App\Http\Controllers;

use App\User;
use App\Mail\Welcome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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


    // Fix pour nom de l'expéditeur
    $user->name = $user->username;

    // Envoi d'une email de bienvenue au nouvel inscrit
    Mail::to($user)
        ->send(new Welcome($user));

    // Redirection à la page d'acceuil.
    return redirect()->home();
  }
}
