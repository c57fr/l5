<?php

namespace App\Http\Controllers;

use App\Article;
use Carbon\Carbon;
use Request;

class ArticlesController extends Controller {

  public function index() {

    $articles = Article::latest()
                       ->get();
    
    foreach ($articles as $article) {
      $article->slug = str_slug($article->id . '-' . $article->title, '-');
    }

    return view('articles.index', compact('articles'));

  }


  public function show($id) {

    $article = Article::findOrFail($id);
    //    return $article;
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
