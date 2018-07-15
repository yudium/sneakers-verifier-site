<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;


class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\VerificationItem::all()->each(function($verificationitem_model) {
            factory(App\Review::class, 1)->make()->each(function ($review_model) use ($verificationitem_model) {
                $verificationitem_model->review()->save($review_model);
            });
        });
    }
}
