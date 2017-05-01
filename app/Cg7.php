<?php
/**
 * Created by PhpStorm.
 * User: cote
 * Date: 01/05/17
 * Time: 10:12
 */
namespace App;

use App\Mail\EnvoiEmailLocal;
use App\Mail\EnvoiLocal;
//use Barryvdh\Debugbar\Middleware\Debugbar;
use Debugbar;
use Illuminate\Support\Facades\Validator;

//
// Bibli pour envoi email
//
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;
use App\Mail\OrderShipped;

class Cg7 {

  //  Vous pouver changer le nom du champs ici (Ex.: nom, email, etc...)
  protected static $nomDuChamps = 'X(NomDuChamps)';  // Ori: X(NomDuChamps)


  public static function TestUsageValidator() {

    $longueurMini = 18; // Changez cette valeur pour tests
    // En général, $input provient d'un formulaire...;
    $input      = [Cg7::$nomDuChamps => 'Que 18 caractères']; // Ori: Que 18 caractères
    $rules      = [
      Cg7::$nomDuChamps => 'required|string|min:' . $longueurMini,
    ];
    $longChamps = strlen($input[Cg7::$nomDuChamps]);
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
      (' est la longueur du champs "' . (Cg7::$nomDuChamps) . '" qui contient la chaine : "' . $input[Cg7::$nomDuChamps] . '".'));
    info('Longueur minimale recquise: ' . $longueurMini);
  }


  public static function TestEnvoiEmail() {

    //    require_once 'lib/swift_required.php';
    // Create the Transport
    $transport = Swift_SmtpTransport::newInstance('smtp.example.org', 25)
                                    ->setUsername('your username')
                                    ->setPassword('your password');
    /*
    You could alternatively use a different transport such as Sendmail or Mail:

    // Sendmail
    $transport = Swift_SendmailTransport::newInstance('/usr/sbin/sendmail -bs');

    // Mail
    $transport = Swift_MailTransport::newInstance();
    */
    // Create the Mailer using your created Transport
    $mailer = Swift_Mailer::newInstance($transport);
    // Create a message
    $message = Swift_Message::newInstance('Wonderful Subject')
                            ->setFrom(['admin@l5' => 'Lionel COTE'])
                            ->setTo(['GrCOTE7@cote7.com' => 'GrCOTE7'])
                            ->setBody('Here is the message itself');
    // Send the message
    //    $result = $mailer->send($message);
    // Bon email posé dans .env
    $testEmail = env('MAIL_FROM_ADDRESS', 'hello@example.com');
    //    debug(new EnvoiLocal);

    Debugbar::AddMessage('Ok db');
    //    return view('pages.contact');
    //    return '  ';

    new EnvoiEmailLocal();


    //    return ('<font style="text-align: center; font-family:arial"><h1>Test Emails en local</h1></font><hr>' . view('articles.index'));
    return ('<font style="text-align: center; font-family:arial"><h1>Test Emails en local</h1></font><hr>' . view('pages.contact'));
    //    return ('<font style="font-family:arial"><h1>Test Emails en local</h1></font>' . view('pages.contact'));
  }
}












