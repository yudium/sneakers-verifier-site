<?php

use Illuminate\Database\Seeder;

class VerificationItemLinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\VerificationItem::all()->each(function($verificationitem_model) {
            $rand_num = rand(4, 10);
            factory(App\VerificationItemLink::class, $rand_num)->make()->each(function ($verificationitemlink_model) use ($verificationitem_model) {
                $verificationitem_model->verification_item_links()->save($verificationitemlink_model);
            });
        });
    }
}
