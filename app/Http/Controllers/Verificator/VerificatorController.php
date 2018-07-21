<?php

namespace App\Http\Controllers\Verificator;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Verificator;

class VerificatorController extends Controller
{
    public function profile($id)
    {
        $verificator = Verificator::withCount([
            'reviews as reviewed_count',
        ])->find($id);

        Log::debug('Verificator: ', ['verificator' => $verificator->name]);

        $verificator->reviews = $verificator->reviews()->paginate(6);

        return view('verificator.profile', compact('verificator'));
    }

    public function change(Request $req)
    {
        // TODO: pake Auth::guard('web_verificator')->user();
        $verificator = Auth::guard('web_verificator')->user();

        if (! Hash::check($req->post('old_password'), $verificator->password)) {
            return redirect()->back()->with([
                'message' => 'Your current password is wrong.',
                'status' => 'FAIL',
            ]);
        }

        $return_message = [];

        // NOTE: this is not working, I don't know why.
        //$verificator->name     = $req->input('name', $verificator->name);
        //$verificator->email    = $req->input('email', $verificator->email);
        $verificator->name     = $req->input('name') ?: $verificator->name;
        $verificator->email    = $req->input('email') ?: $verificator->email;

        if ($req->post('new_password')) {
            if ($req->post('new_password') == $req->post('confirm_password')){
                $verificator->password = Hash::make($req->post('new_password'));
            } else {
                array_push($return_message, [
                    'message' => 'Your confirm password is wrong. But other data has been saved.',
                    'status'  => 'FAIL',
                ]);
            }
        }

        if ($req->hasFile('photo')) {
            $photo_valid = true;

            if (! $req->file('photo')->isValid()) {
                $photo_valid = false;

                array_push($return_message, [
                    'message' => 'There is a problem when uploading your photo',
                    'status'  => 'FAIL',
                ]);
            }

            $validator = Validator::make($req->all(), [
                'photo' => 'required|image',
            ]);
            if ($validator->fails()) {
                $photo_valid = false;

                array_push($return_message, [
                        'message' => 'Your photo is not valid.',
                        'status'  => 'FAIL',
                ]);
            }

            if ($photo_valid) {
                $old_photo_path = $verificator->photo_path;
                Storage::disk('public')->delete($old_photo_path);

                $req->photo->store('user_photo_profile', 'public');
                $new_photo   = $req->photo->hashName();
                $verificator->photo = $new_photo;
            }
        }

        $verificator->save();

        array_push($return_message, [
            'message' => 'Your data has been saved',
            'status'  => 'SUCCESS',
        ]);

        return redirect()->back()->with($return_message);
    }

    public function showBiography($id)
    {
        $verificator = Verificator::find($id);
        return view('verificator.biography', compact('verificator'));
    }
}
