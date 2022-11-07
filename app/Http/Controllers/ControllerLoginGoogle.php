<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class ControllerLoginGoogle extends Controller
{
    /*
        |--------------------------------------------------------------------------
        | Login Controller
        |--------------------------------------------------------------------------
        |
        | This controller handles authenticating users for the application and
        | redirecting them to your home screen. The controller uses a trait
        | to conveniently provide its functionality to your applications.
        |
        */


    //tambahkan script di bawah ini
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }


    //tambahkan script di bawah ini 
    public function handleProviderCallback(Request $request)
    {
        try {
            $user_google    = Socialite::driver('google')->user();
            $user           = User::where('email', $user_google->getEmail())->first();

            //jika user ada maka langsung di redirect ke halaman home
            //jika user tidak ada maka simpan ke database
            //$user_google menyimpan data google account seperti email, foto, dsb
            // dd($user);
            if ($user != null) {
                auth()->login($user, true);
                return redirect('/');
            } else {

                User::Create([
                    'email'             => $user_google->getEmail(),
                    'nama'              => $user_google->getName(),
                    'password'          => 0,
                    'username'          => $user_google->getName(),
                    'role'              => 'User',
                    'email_verified_at' => now(),
                ]);

                $user = User::where('email', $user_google->getEmail())->first();
                auth()->login($user, true);
                return redirect('/');
            }
        } catch (\Exception $e) {
            return redirect('/login');
        }
    }
}
