<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'username',
    'email',
    'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];


  public function publish(Article $article) {

    //dd ($article);
    
    $this->articles()
         ->save($article);

    //    Article::create(request([
    //                              'title',
    //                              'body',
    //                              'user_id',
    //                              'published_at'
    //                            ]));
  }


  /**
   * An user can have many articles.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function articles() {

    return $this->hasMany(Article::class);
  }
}
