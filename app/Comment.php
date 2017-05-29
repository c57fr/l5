<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

  public $fillable = [
    'body',
    'article_id',
    'user_id'
  ];


  public function article() {

    // $comment->article()->PROPRIÉTÉ

    return $this->belongsTo(Article::class);
  }


  public function user() {
    
    // $comment->user->username

    return $this->belongsTo(User::class);
  }
}
