<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller {
  
  public function index(Tag $tag) {

    //return $tag;

//    $articles = new \App\Repositories\Articles();
    $articles=$tag->articles;

//    $articles = $articles->tousAvecUsers();

//dd($articles);
    foreach ($articles as $article) {
      $article->slugDateDelai(1);
      // ToDoLi: Fix Récupérer username sans nouvelle requête
      $article->username=\App\User::select('username')->where('id',$article->user_id)->pluck('username')[0];
    }

    return view('articles.index', compact('articles'));
  }
}
