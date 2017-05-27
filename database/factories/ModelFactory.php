<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {

  static $password;

  return [
    'username'       => $faker->name,
    'email'          => $faker->unique()->safeEmail,
    'password'       => $password ? : $password = bcrypt('pw'),
    'remember_token' => str_random(10),
  ];
});


/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Article::class, function (Faker\Generator $faker) {

  return [
    'user_id'      => function () {

      return factory(App\User::class)->create()->id;
    },
    'title'        => $faker->sentence,
    'body'         => $faker->paragraph,
    'published_at' => \Carbon\Carbon::now()
  ];
});
