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
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Publisher::class, function (Faker\Generator $faker) {
    return [
    'name' => $faker->word
  ];
});

$factory->define(App\Models\Book::class, function (Faker\Generator $faker) {
    $publisher = factory(App\Models\Publisher::class)->create();

    return [
    'title' => $faker->word,
    'author' => $faker->name,
    'edition' => $faker->numberBetween(1, 10),
    'year' => $faker->year,
    'quantity' => $faker->numberBetween(25, 50),
    'available' => $faker->numberBetween(1, 25),
    'publisher_id' => $publisher->id
  ];
});

$factory->define(App\Models\Client::class, function (Faker\Generator $faker) {
    $user = factory(App\Models\User::class)->create([
    "password" => "123456"
  ]);

    return [
    'name' => $faker->name,
    'address' => $faker->address,
    'zip_code' => $faker->postcode,
    'user_id' => $user->id
  ];
});

$factory->define(App\Models\Loan::class, function (Faker\Generator $faker) {
    $client = factory(App\Models\Client::class)->create();
    $book = factory(App\Models\Book::class)->create();

    return [
    'book_id' => $book->id,
    'client_id' => $client->id,
    'loan_date' => $faker->date(),
    'devolution_date' => $faker->date(),
    'return_date' => $faker->date(),
    'penalty' => 0
  ];
});
