<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model {
  
  protected $fillable = [
    'title',
    'body',
    'published_at'
  ];

  protected $dates = ['published_at'];

  public function scopePublished($query) {
    $query->where('published_at', '<=', Carbon::now());
  }


  public function scopeUnPublished($query) {
    $query->where('published_at', '>', Carbon::now());
  }


  public function setPublishedAtAttribute($date) {
    // Date sans les H, m et s
    // $this->attributes['published_at'] = Carbon::parse($date);

    // Date complète même pour édition
    $this->attributes['published_at'] = Carbon::now();
  }
}