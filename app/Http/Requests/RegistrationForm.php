<?php

namespace App\Http\Requests;

use App\User;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationForm extends FormRequest {

  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize() {

    return true;
  }


  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {

    return [
      'username' => 'required|min:2',
      'email'    => 'required|email',
      'password' => 'required|confirmed|min:2'
    ];
  }


  public function persist() {


    // Récup Mot de Passe, codage, et renvoi
    //    $this->request->password = 'testlio';
    //    dd($this);
    //    dd(bcrypt($this->request->get('password')));
    $this->request->set('password', bcrypt($this->request->get('password')));
    //        dd($this->request->get('password'));

    // Créer et sauvegarder l'user.
    $user = User::create($this->only([
                                       'username',
                                       'email',
                                       'password'
                                     ]));

    // Login l'user
    auth()->login($user);


    // Fix pour nom de l'expéditeur
    $user->name = $user->username;

    // Envoi d'une email de bienvenue au nouvel inscrit
    Mail::to($user)
        ->send(new Welcome($user));
  }
}
