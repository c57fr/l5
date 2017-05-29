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


    // Créée $n articles pour tests. Re-initialiser tables avec:
    //  php artisan migrate:refresh --seed

    $n = 3; // Nombre d'articles à générer

    /**
     * Closure $creeArticles
     *
     * @param $n Nombre d'articles à créer
     * @return array $articles
     */
    $creeArticles = function ($n) {

      for ($i = 1; $i < $n; $i++) {
        $nouvellesDates[] = \Carbon\Carbon::createFromTimestamp(mt_rand(1, time()));
      }

      // Pour contrôle dans /storage/laravel.log
      //    info($nouvellesDates);
      sort($nouvellesDates); // Tri des dates
      //    info('######### TRI #########');
      //    info($nouvellesDates);

      for ($i = 1; $i < $n; $i++) {
        $articles[] = [
          'user_id'      => \rand(1, 2),
          'title'        => 'Article ' . $i,
          'body'         => 'Contenu de l\'article ' . $i,
          'created_at'   => $nouvellesDates[$i - 1],
          'updated_at'   => $nouvellesDates[$i - 1],
          'published_at' => $nouvellesDates[$i - 1]
        ];
      }

      $articles[] = [
        'user_id'      => 1,
        'title'        => 'Bienvenue ICI...',
        'body'         => 'Cet ICI, Nul ne sert de php art  le féliciter, Nul ne sert de le critiquer! N\'en faîtes qu\'une chose: Votre Espace ! Soyez heureux, créez, ad libitum, et prenez en plaisir... ALC',
        'created_at'   => \Carbon\Carbon::now(),
        'updated_at'   => \Carbon\Carbon::now(),
        'published_at' => \Carbon\Carbon::now()
      ];
      return $articles;
    };
    //    info($creeArticles($n));

    // ToDoLi Ajouter notion catégories des articles
    //    DB::table('categories')->insert($categories);

    Article::insert($creeArticles($n));
  }
}
