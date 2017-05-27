<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller {

  public function __construct() {

    // Rend authentification nécessaire pour tout ce qui concerne les articles
    // sauf le listage de tous les articles et la vue d'un article'
    $this->middleware('auth');
    //    return $archives;
  }

  
  public function store(Article $article) {

    // Ajoute un commentaire à un article
    //    Comment::create([
    //                      'body'       => request('body'),
    //                      'article_id' => $article->id,
    //                      'user_id'    => 1
    //                    ]);

    $this->validate(request(), ['body' => 'required|min:2']);

    $article->addComment(request('body'));

    return back();
  }
}
