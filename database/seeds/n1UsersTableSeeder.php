<?php

use App\User;
use Illuminate\Database\Seeder;

class n1UsersTableSeeder extends Seeder {

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
        'email'      => 'admin@l5',
        'password'   => bcrypt('pw'),
        'created_at' => new DateTime,
        'updated_at' => new DateTime
      ],
      [
        'username'   => 'Martin',
        'email'      => 'MartinDURAND@l5',
        'password'   => bcrypt('pw'),
        'created_at' => new DateTime,
        'updated_at' => new DateTime
      ]
    ];

    User::insert($users);
  }
}
