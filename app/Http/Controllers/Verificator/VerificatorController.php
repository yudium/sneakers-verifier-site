<?php

namespace App\Http\Controllers\Verificator;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Verificator;
use Validator;

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

    public function createBiography($id)
    {
        $verificator = Verificator::find($id);
        return view('admin.create-verificator-biography', compact('verificator'));
    }

    public function saveBiography(Request $req, $id)
    {
        $verificator = Verificator::find($id);
        $verificator->biography = $req->post('biography');
        $verificator->save();

        return redirect('verificator/'.$id)->with([
            'message' => 'Biography has been saved',
            'status'  => 'SUCCESS',
        ]);
    }

    public function all()
    {
        $verificators = Verificator::orderBy('created_at', 'desc');
        $verificators = $verificators->paginate(20);

        return view('admin/verificator-list', compact('verificators'));
    }
    public function create(Request $req)
    {
        if (! Auth::guard('web_admin')->check()) return view('403');

        $validator = Validator::make($req->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:verificators',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with([
                'message' => 'Some of your input is not valid.',
                'status'  => 'FAIL',
            ]);
        }

        Verificator::create([
            'name' => $req->post('name'),
            'email' => $req->post('email'),
            'password' => Hash::make($req->post('password')),
            'photo' => '',
            'biography' => '',
        ]);

        return redirect('admin/verificator-list')->with([
            'message' => 'New verificator has been created',
            'status'  => 'SUCCESS',
        ]);
    }

    public function delete(Request $req, $id)
    {
        if (Auth::guard('web_admin')->check()) {
            $verificator = Verificator::withCount('reviews')->find($id);

            if ($verificator->reviews_count > 0) {
                return redirect('admin/verificator-list')->with([
                    'message' => 'Verificator cannot be deleted because has review',
                    'status'  => 'FAIL',
                ]);
            }

            $verificator->delete();

            return redirect('admin/verificator-list')->with([
                'message' => 'Verificator has been deleted',
                'status'  => 'SUCCESS',
            ]);
        }
    }
}
