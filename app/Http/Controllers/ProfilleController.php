<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

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
            'password' =>  ['confirmed', Password::min(6)->letters()],
        ]);
        // return $request->current_password;
        // echo auth()->user()->password;
        if (Hash::check($request->current_password, auth()->user()->password)) {
            User::find(auth()->id())->update([
                'password' => Hash::make($request->password)
                // 'password' => bcrypt($request->password)
            ]);
            return back()->withSuccess('New Password Set Successfully');
        } else {
            return back()->withErrors(['current_password' => 'Current Password Doesn\'t Match']);
        }
    }
}
