<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Unique;

class ControllerRegistrasi extends Controller
{
    public function registrasi()
    {
        return view('regis');
    }
    public function store(Request $request)
    {

        if ($request->password == $request->konfirmasi) {

            $request->validate([
                'nama'          => 'required',
                'email'         => 'required | unique:users',
                'username'      => 'required | unique:users',
                'notelp'        => 'required',
                'tgllahir'      => 'required',
                'alamat'        => 'required'
            ]);

            $pass = Hash::make($request->password);
            $role = 'User';

            User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'username' => $request->username,
                'password' => $pass,
                'notelp' => $request->notelp,
                'tgl_lahir' => $request->tgllahir,
                'alamat' => $request->alamat,
                'role' => $role
            ]);

            $details = [];
            Mail::to($request->email)->send(new \App\Mail\ConfirmRegis($details));

            return redirect('/login')->with('success', 'Sign Up Successfull! Please login');
        } else {
            return back()->with('loginError', 'Sorry the data entered is wrong, please Sign Up again');
        }
    }
}
