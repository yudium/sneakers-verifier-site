<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\VerificationItem::class, function (Faker $faker) {
    $dateTime = $faker->dateTime();

    return [
        'type' => $faker->boolean,
        'status_review' => $faker->boolean,
        'created_at' => $dateTime,
        'updated_at' => $dateTime,
    ];
});
