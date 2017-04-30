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
  
  /**
   * Scope queries to articles that have been published
   *
   * @param $query
   */
  public function scopePublished($query) {
    $query->where('published_at', '<=', Carbon::now());
  }

  /**
   * Set the published_at attribute.
   *
   * @param $date
   */
  public function setPublishedAtAttribute($date) {

    // Date issue du formulaire, sans les H, m et s
    $this->attributes['published_at'] = Carbon::parse($date);

  }
}