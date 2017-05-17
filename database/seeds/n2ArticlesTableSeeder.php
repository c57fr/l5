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
      ->delete();
    
    $articles = [
      [
        'user_id'      => 1,
        'title'        => 'Article 1',
        'body'         => 'Contenu de l\'article 1',
        'created_at'   => \Carbon\Carbon::now(),
        'updated_at'   => \Carbon\Carbon::now(),
        'published_at' => \Carbon\Carbon::now()
      ],
    ];


    // Créée plein d'articles pour tests. Re-initialiser tables avec:
    //  php artisan migrate:refresh --seed

    for ($i = 2; $i < 11; $i++) {
      $nouvelleDate = \Carbon\Carbon::createFromTimestamp(mt_rand(1, time()));
      $articles[]   = [
        'user_id'      => \rand(1, 2),
        'title'        => 'Article ' . $i,
        'body'         => 'Contenu de l\'article ' . $i,
        'created_at'   => $nouvelleDate,
        'updated_at'   => $nouvelleDate,
        'published_at' => $nouvelleDate
      ];
    }


    //    DB::table('categories')->insert($categories);
    Article::insert($articles);
  }
}
