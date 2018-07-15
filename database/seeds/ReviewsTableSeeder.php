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
            // NOTE: this random range value depends on number of verificator (check VerificatorsTableSeeder)
            $reviewer = App\Verificator::find(rand(1, 10));

            factory(App\Review::class, 1)->make()->each(function ($review_model) use ($verificationitem_model, $reviewer) {
                $review_model->reviewer_id = $reviewer->id;
                $verificationitem_model->review()->save($review_model);
            });
        });
    }
}
