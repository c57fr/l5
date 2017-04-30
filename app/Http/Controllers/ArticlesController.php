<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleRequest;
use \Debugbar;

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
      $article->slug                 = str_slug($article->id . '-' . $article->title, '-');
      $article['court_published_at'] = substr($article->published_at, 0, 10);
      $article->delai                = $article->created_at->diffForHumans();
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

  /**
   * Save a new article
   *
   * @param ArticleRequest $request
   * @return mixed
   */
  public function store(ArticleRequest $request) {

    Article::create($request->all());

    return redirect('articles');

  }

  public function edit($id) {

    $article = Article::findOrFail($id);
    //    return dd($article);
    
    return view('articles.edit', compact('article'));

  }

  /**
   * Update un article
   *
   * @param ArticleRequest $request
   * @return mixed
   */
  public function update($id, ArticleRequest $request) {

    $article = Article::findOrFail($id);

    $article->update($request->all());

    return redirect('articles');

  }
}
