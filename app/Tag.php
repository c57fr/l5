<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

  public function articles() {

    return $this->belongsToMany(Article::class);
  }
  
  
  public function getRouteKeyName() {

    return 'name';
    
  }
}

//En console :
//php artisan tinker

//$t=App\Tag::where('name','PHP')->first();
//$a=App\Article::first();
//$a->tags()->attach($t);
