<?php

namespace App\Http\Controllers;

use App\Mail\AccountCreation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callback()
    {
        $user = Socialite::driver('google')->user();
        /* echo $user->getName();
        echo "</br>";
        echo $user->getEmail(); */
        $generated_password = Str::upper(Str::random(8));
        User::insert([
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'password' => bcrypt($generated_password),
            'created_at' => Carbon::now(),
            'role' => 'customer',
        ]);
        if (Auth::attempt([
            'email' => $user->getEmail(),
            'password' => $generated_password,
        ])) {
            // Email Send Start
            $info = [
                'email' => $user->getEmail(),
                'name' => $user->getName(),
                'password' => $generated_password,
                'role' => 'customer',
            ];
            Mail::to($user->getEmail())->send(new AccountCreation($info));
            // Email Send End
            return redirect('dashboard');
        }
    }

}
