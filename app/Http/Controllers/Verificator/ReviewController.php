<?php

namespace App\Http\Controllers\Verificator;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\VerificationItem;
use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Show review form
     *
     * TODO: check if verification item not already reviewed
     */
    public function showForm($verification_item_id)
    {
        $verification_item = VerificationItem::find($verification_item_id);

        if ($verification_item == null) {
            return redirect()->back()->with([
                'message' => 'Request cannot handled because the data is not found',
                'status'  => 'FAIL',
            ]);
        }
        if ($verification_item->review) {
            return redirect()->back()->with([
                'message' => 'Request cannot handled because it is already reviewed',
                'status'  => 'FAIL',
            ]);
        }

        return view('review.form', compact('verification_item'));
    }

    public function saveReview($verification_item_id, Request $req)
    {
        $verification_item = VerificationItem::find($verification_item_id);

        if ($verification_item == null) {
            return redirect()->back()->with([
                'message' => 'Request cannot handled because the data is not found',
                'status'  => 'FAIL',
            ]);
        }

        $review         = new Review;
        $review->note   = $req->post('note');
        // only one has value, others is null
        if ($req->post('btn_original')) {
            $review->status = Review::STATUS_ORIGINAL;
        }
        if ($req->post('btn_not_original')) {
            $review->status = Review::STATUS_NOT_ORIGINAL;
        }
        if ($req->post('btn_rejected')) {
            $review->status = Review::STATUS_REJECTED;
        }
        $verification_item->review()->save($review);

        $verification_item->status_review = VerificationItem::STATUS_REVIEWED;
        $verification_item->save();

        // TODO: redirect kemana, tentukan.
        return;
    }
}
