<?php
namespace App\Http\Controllers;

use App\C7;
use App\User;
use Debugbar;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller {

  public function Contact() {

    C7::TestUsageValidator();
    return view('pages.contact');
  }


  public function About() {

    $me        = new \stdClass();
    $me->first = 'Lionel';
    $me->last  = 'COTE';
    
    $friends   = [
      'Pierre',
      'Paul',
      'Jacques'
    ];
    //    $friends =null;
    return view('pages.about', compact('me', 'friends'));
  }


  public function Test() {

    //    C7::TestUsageValidator();

    $u = User::get();
    //    $w = new Welcome($u);
    //    Mail::to($u)
    //        ->send($w);


    $v = [
      'Pierre',
      'Paul',
      'Jacques'
    ];
    //$p='';
    vd($v);
    $v = $v[0];
    return view('pages.test', compact('v'));
  }


  /**
   * TestLocalEmail
   *
   * @return string
   */
  public function TestEnvoiEmailDepuisLocal() {

    //    debug('Méthode de PagesController');
    //    Debugbar::AddMessage('Méthode de PagesController');
    
    return C7::TestEnvoiEmail();
  }
}