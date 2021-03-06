<?php
/**
 * Created by PhpStorm.
 * User: cote
 * Date: 28/05/17
 * Time: 06:50
 */

namespace App\Repositories;

//use Redis;
use App\Article;

class Articles {

  //  protected $redis;
  //
  //
  //  public function __construct(Redis $redis) {
  //
  //    $this->redis = $redis;
  //  }
  //

  public function all() {

    // Retourne tous les articles
    return Article::all();
  }
  
  
  public function tousAvecUsers() {

    // Retourne tous les articles avec les utillisateurs auteurs
    // Une seule requête (Plus efficace)

    return Article::latest('published_at')
                  ->filter(request([
                                     'month',
                                     'year'
                                   ]))
                  ->published()
                  ->leftjoin('users', 'user_id', '=', 'users.id')
                  ->orderBy('id', 'desc')
                  ->get([
                          'articles.id',
                          'users.username',
                          'title',
                          'body',
                          'articles.created_at'
                        ]);
    // orderBty id juste avant le get, ici pour mieux voir certains tests
  }
  
}
