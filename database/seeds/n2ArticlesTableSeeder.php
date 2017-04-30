<?php

use App\Article;
use Illuminate\Database\Seeder;

class n2ArticlesTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {


    DB::table('articles')
      ->truncate();

    $articles = [
      [
        'user_id'      => 1,
        'title'        => 'Article 1',
        'body'         => 'Contenu de l\'article 1',
        'created_at'   => \Carbon\Carbon::now(),
        'updated_at'   => \Carbon\Carbon::now(),
        'published_at' => \Carbon\Carbon::now()
      ],
      [
        'user_id'      => 1,
        'title'        => 'Article 2',
        'body'         => 'Contenu de l\'article 2',
        'created_at'   => \Carbon\Carbon::now(),
        'updated_at'   => \Carbon\Carbon::now(),
        'published_at' => \Carbon\Carbon::now()
      ]
    ];

    //    DB::table('categories')->insert($categories);
    Article::insert($articles);
  }
}
