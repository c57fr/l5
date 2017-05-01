<?php
/**
 * Created by PhpStorm.
 * User: cote
 * Date: 01/05/17
 * Time: 10:12
 */

namespace App;


use Illuminate\Support\Facades\Validator;

class Cg7 {


  public function Maclasse() {

    return 'Ma Classe';
  }


  public function UsageValidator() {

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
  }

}