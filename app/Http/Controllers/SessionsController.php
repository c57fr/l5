<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller {

  public function create() {

    return view('login.create');
  }
  
  
  public function sortir() {

    auth()->logout();
    return redirect()->home();
  }
}
