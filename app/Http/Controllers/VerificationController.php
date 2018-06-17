<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Validator;

class VerificationController extends Controller
{
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
            Log::debug('Redirecting user to previous page')
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
            Log::debug('Redirecting user to previous page')
            return redirect()->back()->with([
                'message' => 'All or some of your image is not valid.',
                'status'  => 'FAIL',
            ]);
        }

        Log::debug('Uploading images by laravel is success');
        Log::debug('Uploaded images is valid');
        foreach ($req->sneakers_images as $img) {
            Log::debug('Store uploaded file to public disk');
            $img->store('verification_sneakers_images', 'public');
        }

        Log::debug('addVerificationRequestImagesBased() is ended');
        // TODO: redirect pengguna ke laman detail request yang baru dibuat
    }
}
