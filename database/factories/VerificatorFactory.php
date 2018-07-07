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

$factory->define(App\Verificator::class, function (Faker $faker) {
    /**
     * I don't want generate many image. So I will generate a bunch of image
     * at one time then save filenames in images.txt and just take the filename
     * for later use.
     */
    $dir        = storage_path('app/public/verificator_photo_profile');
    $txt_file   = "{$dir}/images.txt";

    $files      = scandir($dir);
    $num_files  = count($files)-2; // exclude . and .. directory
    if ($num_files <= 0) {
        $filenames = [];
        for ($i = 0; $i < 12; $i++) {
            $filename = $faker->image('storage/app/public/verificator_photo_profile', 640, 480, null, false);
            array_push($filenames, $filename);
        }
        $str = implode("\n", $filenames);
        file_put_contents($txt_file, $str);
    }

    $images = file($txt_file, FILE_IGNORE_NEW_LINES);
    $image_idx = rand(0, 11);

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => NULL,
        'photo' => $images[$image_idx],
    ];
});
