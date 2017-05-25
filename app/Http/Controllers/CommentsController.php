<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller {
  
  public function store(Article $article) {

    Comment::create([
                      'body'       => request('body'),
                      'article_id' => $article->id,
                      'user_id'    => 1
                    ]);

    return back();
  }
}
