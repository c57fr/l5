<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {

    DB::table('users')
      ->delete();
    
    $users = [
      [
        'username'   => 'admin',
        'email'      => 'admin@admin.laravel',
        'password'   => bcrypt('secret'),
        'created_at' => new DateTime,
        'updated_at' => new DateTime
      ]
    ];
    User::insert($users);
  }
}
