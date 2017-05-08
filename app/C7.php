<?php
/**
 * Created by PhpStorm.
 * User: cote
 * Date: 01/05/17
 * Time: 10:12
 */
namespace App;

use App\Http\Controllers\ArticlesController;
use App\Mail\EnvoiEmailLocal;
use Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

//
// Bibli pour envoi email
//
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;
use App\Mail\OrderShipped;

class C7 {

  //  Vous pouver changer le nom du champs ici (Ex.: nom, email, etc...)
  protected static $nomDuChamps = 'X(NomDuChamps)';  // Ori: X(NomDuChamps)


  // TODOLI Supprimer cette vriable statique car utilisée que dabs une méthode

  public static function TestUsageValidator() {

    $longueurMini = 18; // Changez cette valeur pour tests
    // En général, $input provient d'un formulaire...;
    $input      = [C7::$nomDuChamps => 'Que 18 caractères']; // Ori: Que 18 caractères
    $rules      = [
      C7::$nomDuChamps => 'required|string|min:' . $longueurMini,
    ];
    $longChamps = strlen($input[C7::$nomDuChamps]);
    $messages   = [
      'require' => 'Le champs est vraiment nécessaire...',
      'string'  => 'Le champs doît être de type string',
      'min'     => 'Le champs :attribute doit impérativement avoir au moins :min caractères.',
    ];
    $v          = Validator::make($input, $rules, $messages)
                           ->errors()
                           ->all();
    Debugbar::addMessage($v, 'Test d\'utilisation du validator');
    Debugbar::addMessage($longChamps,
      (' est la longueur du champs "' . (C7::$nomDuChamps) . '" qui contient la chaine : "' . $input[C7::$nomDuChamps] . '".'));
    info('Longueur minimale recquise: ' . $longueurMini);
  }


  /**
   *
   *
   * @return string
   */
  public static function TestEnvoiEmail() {

    //    Debugbar::AddMessage('Racine C7');
    Debugbar::enable();

    new EnvoiEmailLocal();


    //    return ('<font style="text-align: center; font-family:arial"><h1>Test Emails en local</h1></font><hr>' . view('articles.index'));
    return ('<font style="text-align: center; font-weight:"bold"; font-family:arial"><h1>Tests Emails depuis local</h1></font><hr>' . view('pages.contact'));
    //    return ('<font style="font-family:arial"><h1>Test Emails en local</h1></font>' . view('pages.contact'));
  }


  /**
   * Re-initialiser complètement toutes les tables selon migrations et seeders
   * @var $tablesdonnes Option Default: Les 2, 1 - tables seules 2 données seules
   * return voiid
   *
   */
  static public function TablesReset() {

    // Pour tests, remplace ligne de commande php artisan migrate:refrek --seed
    try {

      //      Artisan::call('migrate:rollback');
      //      Artisan::call('migrate');
      // Les 2 appels ci-dessus peuvent être rtemplacés par celui ci-dessous
      Artisan::call('migrate:refresh');
      info('Chaque Table ré-initialisée avec migration'); // Dans LOG

      Artisan::call('db:seed');
      Debugbar::info('Chaque table remplie avec seeder');
    } catch (Exception $e) {
      Response::make('$e->getMessage(),500)');
    }
  }


  public static function active($routeNames) {


    $routeNames = (array) $routeNames;

    foreach ($routeNames as $routeName) {
      if (Route::is($routeName . '*')) {
        return ' class="active"';
      }
    }
    return '';
  }
  
  
  public function test() {

    //    debug(strstr(request()->path(), '/'));
    //    debug(Route::getFacadeRoot()
    //               ->current()
    //               ->getName());
    //    debug(Route::getFacadeRoot()
    //               ->current()
    //               ->uri());
    //    debug(Route::currentRouteAction());
    //    debug(ArticlesController::RUBRIQUE);
    //    debug($routeNames);
    //    debug(strstr(request()->path(), '/'));
    //    debug(ArticlesController::RUBRIQUE);
  }
  
}












