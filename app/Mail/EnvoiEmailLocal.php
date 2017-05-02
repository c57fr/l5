<?php
/**
 * Created by PhpStorm.
 * User: cote
 * Date: 01/05/17
 * Time: 12:25
 */

namespace App\Mail;

use DebugBar;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class EnvoiEmailLocal {

  static protected $aff = 7; // 7 Affichage des données - 77 Afichage + Envoi réel
  static protected $dd; // 7 Affichage des données - 77 Afichage + Envoi réel
  static protected $ee; // Provisoire, just epour faire nouvelle $dd()


  /**
   * EnvoiEmailLocal constructor.
   */
  public function __construct() {

    // Récupère les 2 emails mini nécessaires pour testds,
    // depuis le .env (À adapter !)
    $monEmail = $to = [
      '',
      env('MAIL_GC7', 'hello@example.com'),
      env('MAIL_LIO', 'votreEmail@VotreProvider.com')
    ];

    //    $this->EnvoiEmailLocalParVieuxScript($monEmail[2]); // Modifier ce chiffre par 1 pour email n°1 et ou 2 pour email n°2

//    Debugbar::Addmessage('Récupération des emails du .env');
//    SELF::dd('xxxxxx < Constructor EnvoiEmailLocal');


    $this->EnvoiEmailDepuisLocalParLaravel($monEmail[1]);
  }


  public static function dd($var, $msg = null) {

    if (isset(SELF::$aff) && SELF::$aff > 0) {
      $aff = SELF::$aff;
      return Debugbar::AddMessage($var, $msg);
    }
  }


  /**
   * Envoi d'emails en utilisant SwiftEmailer
   *
   * @param string $to
   */
  public function EnvoiEmailDepuisLocalParLaravel($to = '') {

    // Closure pour avoir message dans debugbar avec juste $dd et 1 param mini
    $dd = function ($v1, $msg = '') {

      return SELF::dd($v1, $msg);
    };
    
    if (!isset($to) || $to == '') {
      $dd('Pas de destinataire défini');
    }
    
    mail($to, 'Essai rapide', 'Tatati'); // Fonctionne
    // $dd($to, 'Destinataire');

    $dd('Ici script pour envoi avec SwiftEmailer dans Laravel', 'Info');


    //    require_once 'lib/swift_required.php';
    // Create the Transport
    $transport = Swift_SmtpTransport::newInstance(env('MAIL_HOST', ''), 587);
    $transport->setUsername(env('MAIL_USERNAME', ''));
    $transport->setPassword(env('MAIL_PW', ''));
    Debugbar::AddMessage($transport, 'Transport');

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
    $message = Swift_Message::newInstance('Envoi depuis SwiftEmailer dans Laravel')
                            ->setFrom([env('MAIL_FROM_ADDRESS', 'hello@example.com') => 'Lionel COTE'])
                            ->setTo([$to => 'GrCOTE7'])
                            ->setBody('Mon super <b>message</b>');
    Debugbar::AddMessage([
      'Sujet: '=>$message->getSubject(),
      'Body: '=>$message->getBody(),
     ]);
    Debugbar::AddMessage($message, 'Message');

    // Send the message
    // $result='À activer en dernier';
    $result = $mailer->send($message);
    Debugbar::AddMessage($result, 'Envoi');
    // Bon email posé dans .env
    $testEmail = env('MAIL_FROM_ADDRESS', 'hello@example.com');
    //    debug(new EnvoiLocal);

    //    Debugbar::AddMessage('Usage page contact provisoire...');
    //    return view('pages.contact');
    //    return '  ';


    //    $m = Mail::class;
    $m = 789;
    $dd($m);
  }


  /**
   * Vieux script d'envoi d'mail légèrement adapté
   *
   * @param $to Destinataire
   */
  public function EnvoiEmailLocalParVieuxScript($to) {

    // Closure pour avoir message dans debugbar avec juste $dd et 1 param mini
    $dd = function ($v1, $msg = '') {

      return SELF::dd($v1, $msg);
    };


    $aff = SELF::$aff;


    if (!isset($to) || $to == '') {
      $dd('Pas de destinataire défini');
    }

    $dd($to, 'Destinataire');

    $mymsg = "noMail";
    $dmn   = $_SERVER["SERVER_NAME"];

    $parts  = explode('.', $dmn);
    $subDmn = 'root';

    echo count($parts);

    //echo 'Dmn: ' . $dmn . '<hr>';
    if (count($parts) > 2) {
      //    vdl($parts);
      $subDmn = ucfirst($parts[0]);
      $nb     = count($parts) - 1;
      array_shift($parts);
      //    vdl($parts);
      $dmn = implode('.', $parts);
    }
    else {
      $parts  = explode('.', $dmn);
      $subDmn = ucfirst($parts[0]);
    }

    $from        = 'zadmin@' . $dmn;
    $fromServeur = env('MAIL_SG1', 'Emai@Du.Serveur');

    $subject = "[" . $subDmn . "] " . $from . ' => ' . $to;
    $txt     = "<h1>Exemple</h1><p style=\"color:blue;\">My txt</p>";
    //    $headers = "From: example@example.com" . "\r\n" . "CC: example@example.com";
    $headers = "From: " . $dmn . "<" . $fromServeur . ">\n";
    $headers .= "Reply-To: " . $from . "\n";
    $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"";


    //    $mail = new PHPMailer(true);
    //    $dd($mail);
    /*
        //Send mail using gmail
        if ($send_using_gmail) {
          $mail->IsSMTP(); // telling the class to use SMTP
          $mail->SMTPAuth   = true; // enable SMTP authentication
          $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
          $mail->Host       = "smtp.gmail.com"; // sets GMAIL as the SMTP server
          $mail->Port       = 465; // set the SMTP port for the GMAIL server
          $mail->Username   = "your-gmail-account@gmail.com"; // GMAIL username
          $mail->Password   = "your-gmail-password"; // GMAIL password
        }

        //Typical mail data
        $mail->AddAddress($email, $name);
        $mail->SetFrom($email_from, $name_from);
        $mail->Subject = "My Subject";
        $mail->Body    = "Mail contents";

        try {
          $mail->Send();
          echo "Success!";
        } catch (Exception $e) {
          //Something went bad
          echo "Fail :(";
        }
        */

    $dd([
          'From'       => $from,
          'FromServer' => $fromServeur,
          'To'         => $to,
          'Sujet'      => $subject,
          'Contenu'    => $txt,
          'Headers'    => $headers
        ]);

    if (isset($aff) && $aff > 0) {

      $dd($aff, 'aff');

      if ($aff == 77) {
        mail($to, $subject, $txt, $headers);
        $dd('Envoi en vrai');
        $rep   = '<hr>Mail envoyé :' . $from . ' => <b>' . $to . '</b><hr>' . $txt;
        $mymsg = 'Mail OK';
      }
      else {
        $dd($aff, 'Envoi non recquis');
        $rep = '<hr>Mail demandé mais pas envoyé.';
      }
    }
    //      echo '<h3>Test mail().' . (isset($rep) ? $rep : '') . '<hr>Prêt à envoyer :<br>' . $from . ' => <b > ' . $to . '</b ><hr > ' . $headers . '<hr > ' . $subDmn . '</h3>';
  }

}

/*

// Envoi d'un email depuis ligne de commande VBox en ligne / Serveur ou serveur local si configuré:

// echo "Hello - this is a test!" | mail -s 'Testing depuis mon PC' lionel@sg1.cote7.com
[Optionnel, pour changer le nom de l'expéditeur, ajouter] -a From: CeQueVousVoulez


Pré-recquis:
- Install des paquets sendmail & mailutils
- Paramétrer les 2 fichiers:

  - /etc.ssmtp.conf
-------------------------------------------------------------
#
# Config file for sSMTP sendmail
#
# The person who gets all mail for userids < 1000
# Make this empty to disable rewriting.
root=Votre_email@votre_fournisseur.ext

# The place where the mail goes. The actual machine name is required no 
# MX records are consulted. Commonly mailhosts are named mail.domain.com
# 587 est le port
mailhub=Votre_Serveur_SMTP:587

# Where will the mail seem to come from? [|]Optionnel]
; rewriteDomain=Possible

# The full hostname (Taper hostname ds votre console our le connaître)
hostname=VotreServeurDeNom

# Are users allowed to set their own From: address?
# YES - Allow the user to specify their own From: address
# NO - Use the system generated From: address
FromLineOverride=YES

# Nom d'utilisateur du compte email avec lequel vous envoyer les courriels
AuthUser=Votre_email@votre_fournisseur.ext

# Mot de passe de ce même compte
AuthPass=VotreMotDePasse

# Utilisation d'une connexion sécurisée SSL/TLS (décommenter pour activer)
# Possible ici juste UseTTLS=YES
UseSTARTTLS=YES




  - /etc/ssmtp/revaliases:
  ------------------------------------------------------------

# sSMTP aliases
#
# Format: local_account:outgoing_address:mailhub
#
# Example: root:your_login@your.domain:mailhub.your.domain[:port]
# where [:port] is an optional port number that defaults to 25.

root:Votre_email@votre_fournisseur.ext:smtp.Votre_Serveur_SMTP:587
VotrePrenom:Votre_email@votre_fournisseur.ext:smtp.Votre_Serveur_SMTP:587


php -i => Trouver le chemin du php.ini utilisé en mode CLI
(Ligne de commande)

Editer et changer:

sendmail_path =/usr/sbin/ssmtp -t


Modifier aussi, si autre, le php.ini en localhost

*/