<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\VerificationItem;
use App\VerificationItemLink;
use App\VerificationItemImage;
use App\Repositories\UserRepository;
use Validator;

class VerificationController extends Controller
{
    private $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function addVerificationRequestImagesBased(Request $req)
    {
        Log::debug('addVerificationRequestImagesBased() is started');
        Log::debug('sneakers images information:', ['num_image' => count($req->sneakers_images)]);

        $isAllValid = true;
        foreach ($req->sneakers_images as $img) {
            Log::debug('check status "uploading process" of one image');
            if (! $img->isValid()) $isAllValid = false;
        }
        if (! $isAllValid) {
            Log::error('Upload image process is fail');
            Log::debug('Redirecting user to previous page');
            return redirect()->back()->with([
                'message' => 'There is a problem when uploading images',
                'status'  => 'FAIL',
            ]);
        }

        $validator = Validator::make($req->all(), [
            'sneakers_images.*' => 'required|image',
        ]);
        if ($validator->fails()) {
            Log::debug('Images is not valid.');
            Log::debug('Redirecting user to previous page');
            return redirect()->back()->with([
                'message' => 'All or some of your image is not valid.',
                'status'  => 'FAIL',
            ]);
        }

        Log::debug('Uploading images by laravel is success');
        Log::debug('Uploaded images is valid');
        $images_path = [];
        foreach ($req->sneakers_images as $img) {
            Log::debug('Store uploaded file to public disk');
            $img->store('verification_sneakers_images', 'public');
            array_push($images_path, $img->hashName());
        }

        /* I know I can do all this without user model and just simple
         * assignment: `$verification_item->user_id = Auth::id()`.  But this is
         * just more safe to ensure user is exists. Maybe I am paranoid.
         * But who know about future risks?
         */
        $user = $this->user->find(Auth::id());

        $verification_item                = new VerificationItem;
        $verification_item->type          = VerificationItem::TYPE_IMAGES_BASED;
        $verification_item->status_review = VerificationItem::STATUS_UNREVIEWED;
        $user->verification_items()->save($verification_item);
        {
            Log::debug('Inner block executed');
            foreach ($images_path as $image_path) {
                Log::debug('image_path: ', ['image_path' => $image_path]);
                $verification_item_image       = new VerificationItemImage;
                $verification_item_image->path = $image_path;
                $verification_item->verification_item_images()->save($verification_item_image);
            }
        }

        Log::debug('addVerificationRequestImagesBased() is ended');
        // TODO: redirect pengguna ke laman detail request yang baru dibuat
    }

    public function addVerificationRequestLinkBased(Request $req)
    {
        Log::debug('addVerificationRequestLinkBased started');
        /* I know I can do all this without user model and just simple
         * assignment: `$verification_item->user_id = Auth::id()`.  But this is
         * just more safe to ensure user is exists. Maybe I am paranoid.
         * But who know about future risks?
         */
        $user = $this->user->find(Auth::id());
        Log::debug('user model: ', ['user' => $user]);

        $verification_item                = new VerificationItem;
        $verification_item->type          = VerificationItem::TYPE_LINK_BASED;
        $verification_item->status_review = VerificationItem::STATUS_UNREVIEWED;
        $user->verification_items()->save($verification_item);
        {
            Log::debug('Inner block executed');
            $verification_item_link       = new VerificationItemLink;
            $verification_item_link->link = $req->link;
            $verification_item->verification_item_link()->save($verification_item_link);
        }

        Log::debug('addVerificationRequestLinkBased ended');
        // TODO: redirect pengguna ke laman detail request yang baru dibuat
    }
}
