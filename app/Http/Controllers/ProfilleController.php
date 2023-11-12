<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Intervention\Image\ImageManagerStatic as Image;

class ProfilleController extends Controller
{
    public function index()
    {
        return view('backend.profille.index');
    }
    public function change_password(Request $request)
    {
        $request->validate([
            /* 'current_password'=> 'required',
            'new_password'=> 'required',
            'confirm_password'=> 'required', */
            '*' => 'required',
            'password' => ['confirmed', Password::min(6)->letters()],
        ]);
        // return $request->current_password;
        // echo auth()->user()->password;
        if (Hash::check($request->current_password, auth()->user()->password)) {
            User::find(auth()->id())->update([
                'password' => Hash::make($request->password),
                // 'password' => bcrypt($request->password)
            ]);
            return back()->withSuccess('New Password Set Successfully');
        } else {
            return back()->withErrors(['current_password' => 'Current Password Doesn\'t Match']);
        }
    }
    public function change_information(Request $request)
    {
        if ($request->hasFile('profile_photo')) {
            if (auth()->user()->profile_photo) {
                unlink(public_path("uploads/avatar_photos/") . auth()->user()->profile_photo);

            }
            // Photo Upload Start
            $new_name = Str::lower(Str::random(20)) . '.' . $request->file('profile_photo')->extension();
            $photo_path = 'uploads/avatar_photos/' . $new_name;
            Image::make($request->file('profile_photo'))->resize(300, 200)->save($photo_path);
            // Photo Upload Ends
            // Database Upload Starts
            User::find(auth()->id())->update([
                'profile_photo' => $new_name,
            ]);
            // Database Upload Ends
        }

        User::find(auth()->id())->update([
            'name' => $request->name,
        ]);
        return back()->with('info_success', 'Information Updated Successfully');

    }
}
