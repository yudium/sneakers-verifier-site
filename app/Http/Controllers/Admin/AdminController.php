<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Admin;
use App\VerificationItem;
use Validator;

class AdminController extends Controller
{
    public function getVerificationList()
    {
        $verification_items = VerificationItem::paginate(6);

        return view('admin.verification-list', compact( 'verification_items'));
    }

    public function change(Request $req)
    {
        $admin = Auth::guard('web_admin')->user();

        if (! Hash::check($req->post('old_password'), $admin->password)) {
            return redirect()->back()->with([
                'message' => 'Your current password is wrong.',
                'status' => 'FAIL',
            ]);
        }

        $return_message = [];

        // NOTE: this is not working, I don't know why.
        //$admin->name     = $req->input('name', $admin->name);
        //$admin->email    = $req->input('email', $admin->email);
        $admin->name     = $req->input('name') ?: $admin->name;
        $admin->email    = $req->input('email') ?: $admin->email;

        if ($req->post('new_password')) {
            if ($req->post('new_password') == $req->post('confirm_password')){
                $admin->password = Hash::make($req->post('new_password'));
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
                $old_photo_path = $admin->photo_path;
                Storage::disk('public')->delete($old_photo_path);

                $req->photo->store('admin_photo_profile', 'public');
                $new_photo   = $req->photo->hashName();
                $admin->photo = $new_photo;
            }
        }

        $admin->save();

        array_push($return_message, [
            'message' => 'Your data has been saved',
            'status'  => 'SUCCESS',
        ]);

        return redirect()->back()->with($return_message);
    }

    public function delete(Request $req)
    {
        $user = Auth::user();

        Auth::logout();

        $user->delete();

        return redirect('/');
    }

    public function all()
    {
        $admins = Admin::orderBy('created_at', 'desc');
        $admins = $admins->paginate(20);

        return view('admin/admin-list', compact('admins'));
    }

    public function create(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with([
                'message' => 'Some of your input is not valid.',
                'status'  => 'FAIL',
            ]);
        }

        Admin::create([
            'name' => $req->post('name'),
            'email' => $req->post('email'),
            'password' => Hash::make($req->post('password')),
            'photo' => '',
        ]);

        return redirect('admin/admin-list')->with([
            'message' => 'New admin has been created',
            'status'  => 'SUCCESS',
        ]);
    }
}
