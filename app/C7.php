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
use Illuminate\Support\Debug\Dumper;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
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
    return '';
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
  
  
  /**
   *vd m"aison" : Renvoie aussi la ligne et le fichier où est posé l'appel
   * (Très utiles pour rapidement retrouver tous les vd qu'on a posé)
   * Pour l'heure, affiche "en dur" en haut de page
   * TODOLI: Améliorer affichage (Utiliser un onglet perso dans debugbar) Cf. ce qui a été fait un peu pour premiers tests d'envoi d'emails
   * Affiche les variables.
   *
   * @param  mixed
   * @return void
   */
  public static function vd(...$args) {

    $origine = debug_backtrace();
    $file    = $origine[1]['file'];
    $line    = $origine[1]['line'];

    //    $inst = new C7();
    //    $inst->test();
    $file = str_ireplace((base_path()), '', $file);
    $ori  = 'Ligne: ' . $line . ' | ' . $file;
    //    (new Dumper)->dump('Ligne: ' . $line . ' | ' . $file);

    /*
        if (!isset($args)) return;
        foreach ($args as $x) {
          (new Dumper)->dump($x);
        }
        //    (new Dumper)->dump(debug_backtrace());
    */
    DebugBar::AddMessage($args, $ori);
    //    die();
  }

  
  /**
   * @param null $surQuoi
   *        route/path
   *
   */
  public static function Aide($surQuoi = null) {


    $inst = (new C7)->exemples(); // Pour afficher les helpers liés au path

  }


  public function exemples($surQuoi = '') {

    if (!$surQuoi) Debugbar::info('Choix possibles: * routes | * path');

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

    if ($surQuoi == 'path') {
      Debugbar::AddMessage('app_path()', app_path());
      Debugbar::AddMessage('base_path()', base_path());
      Debugbar::AddMessage('config_path()', config_path());
      Debugbar::AddMessage('database_path()', database_path());
      Debugbar::AddMessage('public_path()', public_path());
      Debugbar::AddMessage('resource_path()', resource_path());
      Debugbar::AddMessage('storage_path()', storage_path());
    }
  }


  public static function moisEnFr($month) {

    $month    = strtolower($month);
    $moisEnFr = [
      'january'   => 'janvier',
      'february'  => 'février',
      'march'     => 'mars',
      'april'     => 'avril',
      'may'       => 'mai',
      'june'      => 'juin',
      'july'      => 'juillet',
      'august'    => 'août',
      'september' => 'septembre',
      'october'   => 'octobre',
      'november'  => 'novembre',
      'december'  => 'décembre'
    ];
    return $moisEnFr[$month];
  }
  
  
  /**
   * Pour tests
   *
   * @return void
   */
  public function test() {
    //    return '';
  }
  
}