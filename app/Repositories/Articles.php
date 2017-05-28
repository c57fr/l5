<?php
/**
 * Created by PhpStorm.
 * User: cote
 * Date: 28/05/17
 * Time: 06:50
 */

namespace App\Repositories;

use App\Article;

class Articles {
  
  public function all() {

    // Retourne tous les articles
    return Article::all();
  }
}
