<?php

namespace App\Http\Controllers;

use App\Article;
//use Carbon\Carbon;
use Request;

class ArticlesController extends Controller {


  /**
   * Show all articles
   *
   * @return mixed Response
   */
  public function index() {

    $articles = Article::latest('published_at')
                       ->published()
                       ->get();
    
    foreach ($articles as $article) {
      $article->slug  = str_slug($article->id . '-' . $article->title, '-');
      $article->delai = $article->created_at->diffForHumans();
    }

    return view('articles.index', compact('articles'));

  }


  public function show($id) {

    $article = Article::findOrFail($id);
    //    dd($article->published_at);
    //    return $article->created_at->addDays(8)->format('Y-m');
    return view('articles.show', compact('article'));

  }


  public function create() {

    return view('articles.create');

  }

  
  public function store() { 

    Article::create(Request::all());

    return redirect('articles');

  }

}
