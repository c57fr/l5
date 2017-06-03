<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller {
  
  public function __construct() {

    $this->middleware('guest');
  }


  public function create() {

    return view('sessions.create');
  }
  
  
  public function store() {

    // Tentative d'authentification de l'user
    // Si OK, entrer
    // Si échec, redirige back
    if (!auth()->attempt(request([
                                   'email',
                                   'password'
                                 ]))
    ) {
      return back();
    }

    // Redirige sur la home page
    return redirect()->home();
  }


  public function destroy() {

    dd('oki');
    auth()->logout();
    return redirect('/');
  }
}
