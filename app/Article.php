<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {

  protected $fillable = [
    'title',
    'body',
    'user_id',
    'published_at'
    // Temp
  ];

  protected $dates = ['published_at'];


  public static function archives() {

    return static::selectRaw('year(articles.created_at) year, monthname(articles.created_at) month, count(*) published')
                 ->groupBy('year', 'month')
                 ->orderByRaw('min(articles.created_at) desc')
                 ->get();
  }


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
  
  
  /**
   * An article is owned by a user.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function user() {

    return $this->belongsTo(User::class);
  }


  public function scopeFilter($query, $filters) {
    
    if ($month = $filters['month']) {

      $query->whereMonth('articles.created_at', Carbon::parse($month)->month);
    }

    if ($year = $filters['year']) {

      $query->whereYear('articles.created_at', $year);
    }
  }

  
  public function addComment($body) {

    $user_id = auth()->id();

    $this->comments()
         ->create(compact('body', 'user_id'));
  }


  public function comments() {

    return $this->hasMany(Comment::class);
  }

}