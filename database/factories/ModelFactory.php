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

    return [
        'name' => $faker->firstName,
        'surname' => $faker->lastName,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
    ];
});

$factory->define(App\Comments::class, function (Faker\Generator $faker) {

    return [
        'author' => $faker->name,
        'text' => $faker->text(255),
        'mark' => $faker->numberBetween(0,5),
        'user_id' => $faker->numberBetween(1,50),
    ];
});
