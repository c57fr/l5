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
    // depuis le .env (À adapter !). Donc, ne rien changer ici.
    $to = [
      env('MAIL_USERNAME', 'VotreEmail@VotreProvider.com'),
      env('MAIL_SECONDAIRE', 'UnAutre@Email.com')
    ];

    //    $this->EnvoiEmailLocalParVieuxScript($to[0]); // Modifier ce chiffre par 0 pour email n°1 et ou 1 pour email n°2

    //    Debugbar::Addmessage('Récupération des emails du .env');
    //    SELF::dd('xxxxxx < Constructor EnvoiEmailLocal');


    $this->EnvoiEmailDepuisLocalParSwiftemailer($to);
  }


  /**
   * Envoi d'emails en utilisant SwiftEmailer
   *
   * @param string $to
   *
   * Doc complète : http://swiftmailer.org/docs/messages.html
   */
  public function EnvoiEmailDepuisLocalParSwiftemailer($to = []) {

    // Closure pour avoir message dans debugbar avec juste $dd et 1 param mini
    $dd = function ($v1, $msg = '') {

      return SELF::dd($v1, $msg);
    };

    if (!count($to)) {
      $dd('Pas de destinataire défini');
    }

    //    mail($to[0], 'Essai rapide', 'Tatati'); // Fonctionne

    info('Ici script pour envoi avec SwiftEmailer dans Laravel', ['Info']);

    $dd($to, 'Destinataire(s)');

    //    require_once 'lib/swift_required.php';
    // Create the Transport
    $transport = Swift_SmtpTransport::newInstance(env('MAIL_HOST', ''), 587);
    $transport->setUsername(env('MAIL_USERNAME', ''));
    $transport->setPassword(env('MAIL_PASSWORD', ''));
    //    Debugbar::AddMessage($transport, 'Transport');

    /*
     You could alternatively use a different transport such as Sendmail or Mail:

     // Sendmail
     $transport = Swift_SendmailTransport::newInstance('/usr/sbin/sendmail -bs');

     // Mail
     $transport = Swift_MailTransport::newInstance();
     */
    // Create the Mailer using your created Transport
    $mailer = Swift_Mailer::newInstance($transport);

    $msgp = 'Salut...<br/><br/>Peux-tu en répondant simplement à ce message,<br/>me dire si tu reçois bien cet email, et bien dans ton dossier normal d\'emails ?<br/><br/>Par avance, merci.<br/><br/><hr />Machine Virtuelle #004 - PC # 002<hr />';

    // Create a message
    $message = Swift_Message::newInstance('Test Mail < ' . env('MAIL_FROM_NAME'))
                            ->setFrom([env('MAIL_USERNAME', 'Admin@C57.fr') => 'Lionel COTE'])
                            ->setTo([
                                      $to[0],
                                      $to[1] => 'Lio'
                                    ])
                            ->setBody($msgp . '<b>Mon</b> <q>1<sup>er</sup></q> <b>message</b>
depuis http://l5/tem<br/><br/>Depuis Cg7::EnvoiEmailLocal() (SwiftEmailer dans Laravel)', 'text/html');

    Debugbar::AddMessage([
                           'Sujet: '  => $message->getSubject(),
                           'Body: '   => $message->getBody(),
                           '$Message' => $message
                         ]);

    // Send the message
    $result = 0; // Pour affichage du résultat dans la débugbar, même si ligne d'activation de l'envoi activée


    // Décommenter la ligne ci-après pour envoyer réellement

    $result = $mailer->send($message);
    //    debug($result);

    $plur = ($result > 1) ? 's' : '';
    Debugbar::AddMessage(($result > 0) ? $result . ' envoi' . $plur . ' réalisé' . $plur : ('Pas d\'envoi réalisé (Ligne send() commentée)'));
  }


  public static function dd($var, $msg = null) {

    if (isset(SELF::$aff) && SELF::$aff > 0) {
      $aff = SELF::$aff;
      return Debugbar::AddMessage($var, $msg);
    }
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
    $fromServeur = env('MAIL_USERNAME', 'Emai@Du.Serveur');

    $subject = "[" . $subDmn . "] " . $from . ' => ' . $to;
    $txt     = "<h1>Exemple</h1><p style=\"color:blue;\">My txt</p>";
    //    $headers = "From: example@example.com" . "\r\n" . "CC: example@example.com";
    $headers = "From: " . $dmn . "<" . $fromServeur . ">\n";
    $headers .= "Reply-To: " . $from . "\n";
    $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"";


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

Envoi d'un email depuis ligne de commande VBox en ligne / Serveur ou de votre console de votre serveur local si configuré:

// echo "Hello - this is a test!" | mail -s 'Testing depuis mon PC' Votre@Email.com

[Optionnel, pour changer le nom de l'expéditeur, ajouter] -a From: CeQueVousVoulez


Pré-recquis:
- Install des paquets sendmail (apt install ssmtp) & mailutils (apt install mailutils)
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


php -i => Trouver le chemin du php.ini utilisé en mode CLI (Ligne de commande)
(Ici <=> <?php phpinfo(); ?> dans un fichier php et appelé dans votre navigatuer => Tous les params

Pour trouver ce point précis plus aisément: php --ini


Editer le php.ini concerné, et changer:

1) Commenter smtp_port

2 )sendmail_path =/usr/sbin/ssmtp -t

Aide:
Exemple dans sublimeText, et souvent autres éditeurs:
Ctrl + F sendma vous permet de trouver l'endroit (F3: occurence suivante - Shift + F3: occurence précédente
le " ; " en début de ligne indique que la ligne est commentée... Donc, ôter ce " ; "


Modifier aussi, si autre (Souvent le cas), le php.ini de votre serveur localhost
afin que mail() de php fonctionne dans vos scripts

Test suggéré:C5
- Sans avoir toucher aucun code: Dans votre L5 local, simuler le fait d'avoir perdu le mot de passe...
-  1) Remplissez le .env selon le modèle .env.c57l5.exemple (à renommer en .env)
   2) Décommenter la ligne send() de la méthode EnvoiEmailDepuisLocalParSwiftemailer()
du script app/Mail/EmailLocal et vous rendre à:
    http://localhost/l5/tem

*/