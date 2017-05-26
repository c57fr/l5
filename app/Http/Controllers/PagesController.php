<?php
namespace App\Http\Controllers;

use App\Article;
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
    $articles = Article::latest('published_at')
                       ->filter(request([
                                          'month',
                                          'year'
                                        ]))
                       ->published()
      ->leftjoin('users','user_id', '=','users.id')
                       ->get([
                               'articles.id',
                               'users.username',
                               'title',
                               'body',
                               'articles.created_at'
                             ]);

    //    vd($v[0]);
    $ch='';
    foreach($articles as $a){
      vd($a->id); // Un "var_dump" maison
      $ch.=$a->id." ";
    }
    $v=123;
    //    $v = $v[0];
//    return $v;
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