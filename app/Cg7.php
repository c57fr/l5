<?php
/**
 * Created by PhpStorm.
 * User: cote
 * Date: 01/05/17
 * Time: 10:12
 */

namespace App;


use Debugbar;
use Illuminate\Support\Facades\Validator;

class Cg7 {

  //  Vous pouver changer le nom du champs ici (Ex.: nom, email, etc...)
  protected static $nomDuChamps = 'X(NomDuChamps)';  // Ori: X(NomDuChamps)


  public static function UsageValidator() {

    $longueurMini = 18; // Changez cette valeur pour tests

    // En général, $input provient d'un formulaire...;
    $input = [Cg7::$nomDuChamps => 'Que 18 caractères']; // Ori: Que 18 caractères


    $rules = [
      Cg7::$nomDuChamps => 'required|string|min:' . $longueurMini,
    ];

    $longChamps = strlen($input[Cg7::$nomDuChamps]);

    $messages = [
      'require' => 'Le champs est vraiment nécessaire...',
      'string'  => 'Le champs doît être de type string',
      'min'     => 'Le champs :attribute doit impérativement avoir au moins :min caractères.',
    ];

    $v = Validator::make($input, $rules, $messages)
                  ->errors()
                  ->all();

    Debugbar::addMessage($v, 'Test d\'utilisation du validator');
    Debugbar::addMessage($longChamps,
      (' est la longueur du champs "' . (Cg7::$nomDuChamps) . '" qui contient la chaine : "' . $input[Cg7::$nomDuChamps] . '".'));
    info('Longueur minimale recquise: ' . $longueurMini);
  }

}