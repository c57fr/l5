<?php
/**
 * Created by PhpStorm.
 * User: cote
 * Date: 01/05/17
 * Time: 12:25
 */

namespace App\Mail;


use DebugBar;
use PHPMailer;

class EnvoiEmailLocal {

  static protected $aff = 77;


  /**
   * EnvoiEmailLocal constructor.
   */
  public function __construct() {

    $this->envoi('GrCOTE7@GMail.com');

    Debugbar::info('Class EnvoiEmailLocal');
    return 'ok';
    //    return view('pages.contact');
  }
  
  
  public function envoi($to) {

    // Closure pour avoir message dans debugbar avec kust$dd et 1 param mini
    $dd  = function ($v1, $msg = '') {

      return SELF::dd($v1, $msg);
    };
    $aff = SELF::$aff;

    if (!isset($to)) {
      die('Pas de destinataire défini');
    }

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

    $from = 'zadmin@' . $dmn;
    $from = 'lionel@sg1.cote7.com';

    $subject = "[" . $subDmn . "] : " . $from . ' => ' . $to;
    $txt     = "<h1>Exemple</h1><p style=\"color:blue;\">My txt</p>";
    //    $headers = "From: example@example.com" . "\r\n" . "CC: example@example.com";
    $headers = "From: " . $dmn . "<" . $from . ">\n";
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


    if (isset($aff) && $aff == 77) {

      $dd([
            'From'    => $from,
            'To'      => $to,
            'Sujet'   => $subject,
            'Contenu' => $txt,
            'Headers' => $headers
          ]);
      if (mail($to, $subject, $txt, $headers)) {
        $rep   = '<hr>Mail envoyé :' . $from . ' => <b>' . $to . '</b><hr>' . $txt;
        $mymsg = 'Mail OK';
      }
      else {
        $rep = '<hr>Mail demandé mais pas envoyé.';
      }
    }
    echo '<h3>Test mail().' . (isset($rep) ? $rep : '') . '<hr>Prêt à envoyer : ' . $from . ' => <b > ' . $to . '</b ><hr > ' . $headers . '<hr > ' . $subDmn . '</h3>';
  }


  public static function dd($var, $msg = null) {

    if (isset(SELF::$aff) && SELF::$aff > 0) {
      $aff = SELF::$aff;
      return DebugBar::AddMessage($var, $msg);
    }
  }
}

// Envoi d'un email depuis ligne de commande VBox en ligne / Serveur
// echo "Hello - this is a test!" | mail -s 'Testing depuis mon PC' lionel@sg1.cote7.com
// echo "Hello - this is a test!" | mail -s 'Testing depuis mon PC' lionel@sg1.cote7.com -a From:localhost@lionel.cote