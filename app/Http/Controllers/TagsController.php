<?php

namespace App\Http\Controllers;

use App\Tag;
use App\User;
use Illuminate\Http\Request;

class TagsController extends Controller {
  
  public function index(Tag $tag) {

    //return $tag;

    //    $articles = new \App\Repositories\Articles();
    $articles = $tag->articles;

    //    $articles = $articles->tousAvecUsers();

    //dd($articles);
    foreach ($articles as $article) {
      $article->slugDateDelai(1);
      $article->username = User::select('username')
                               ->where('id', $article->user_id)
                               ->firtst();
    }

    return view('articles.index', compact('articles'));
  }
}
