<?php

use Illuminate\Database\Seeder;

class VerificationItemsTableSeeder extends Seeder
{
    /**
     * Setiap pengguna memiliki jumlah verification item berbeda-beda
     *
     * @return void
     */
    public function run()
    {
        App\User::all()->each(function($user_model) {
            $rand_num = rand(0, 30);
            factory(App\VerificationItem::class, $rand_num)->make()->each(function($verification_item_model) use ($user_model) {
                $user_model->verification_items()->save($verification_item_model);
            });
        });
    }
}
