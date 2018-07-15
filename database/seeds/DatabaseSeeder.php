<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            VerificationItemsTableSeeder::class,
            VerificationItemImagesTableSeeder::class,
            VerificationItemLinksTableSeeder::class,
            VerificatorsTableSeeder::class,
            ReviewsTableSeeder::class,
        ]);
    }
}

