<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountCreation;

class  UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('backend.user.index', compact('users'));
    }
    public function create()
    {
        return view('backend.user.create');
    }
    public function insert(Request $request)
    {
        // return $request;
        $generated_password = Str::upper(Str::random(8));
        $user_id = User::insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($generated_password),
            'created_at' => Carbon::now(),
            'role' => $request->role
        ]);

        if ($request->hasFile('profile_photo')) {
            // Photo Upload Start
            $new_name = Str::lower(Str::random(20)) . '.' . $request->file('profile_photo')->extension();
            $photo_path = 'uploads/avatar_photos/' . $new_name;
            Image::make($request->file('profile_photo'))->resize(300, 200)->save($photo_path);
            // Photo Upload Ends
            // Database Upload Starts
            User::find($user_id)->update([
                'profile_photo' => $new_name,
            ]);
            // Database Upload Ends
        }
        // Email Send Start
        $info = [
            'email' => $request->email,
            'name' => $request->name,
            'password' => $generated_password,
            'role' => $request->role,
        ];
        Mail::to($request->email)->send(new AccountCreation($info));
        
        // Email Send End
        return back();
    }
}
