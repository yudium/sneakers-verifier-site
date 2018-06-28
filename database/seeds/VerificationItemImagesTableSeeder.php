<?php

use Illuminate\Database\Seeder;

class VerificationItemImagesTableSeeder extends Seeder
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
            factory(App\VerificationItemImage::class, $rand_num)->make()->each(function ($verificationitemimage_model) use ($verificationitem_model) {
                $verificationitem_model->verification_item_images()->save($verificationitemimage_model);
            });
        });
    }
}
