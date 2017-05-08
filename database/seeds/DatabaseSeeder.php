<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {

    Eloquent::unguard();

    // Pour charger automatiquement tous les seeders existant dans le dossier
    $classes = require base_path() . '/vendor/composer/autoload_classmap.php';
    foreach ($classes as $class) {
      if (strpos($class, 'TableSeeder') !== false) {
        $seederClass = substr(last(explode('/', $class)), 0, -4);
        $this->call($seederClass);
      }
    }
  }

  // Apple d'un seed en particulier
  // $this->call(UsersTableSeeder::class);

}
