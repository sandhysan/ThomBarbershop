<?php

namespace App\Http\Controllers;

use App\Mail\MyMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class ControllerReset extends Controller
{
    public function forget()
    {
        return view('forget');
    }

    public function link(Request $request)
    {
        $data = User::all();
        $data = $data->where('email', 'like', $request->email);
        $details = ['email' => Crypt::encrypt($request->email)];

        if (count($data) == 0) {
            return redirect('/login')->with('success', 'Password reset link has been sent');
        }
        Mail::to($request->email)->send(new MyMail($details));
        return redirect('/login')->with('success', 'Password reset link has been sent');
    }

    public function password($email)
    {
        $data = User::where('email', Crypt::decrypt($email))->first();
        if ($data->password == 0) {
            return redirect('/login')->with('success', 'You are registered with google account');
        }
        return view('reset', ['email' => $email]);
    }

    public function simpan(Request $request, $email)
    {
        $request->validate([

            'password' => 'required',
            'konfirmasi' => 'required',

        ]);

        if ($request->password == $request->konfirmasi) {
            $email = Crypt::decrypt($email);

            $data = User::where('email', 'like', $email)
                ->first(); // this point is the most important to change
            $data->password = bcrypt($request->password);
            $data->save();
            return redirect('/login')->with('success', 'Password updated successfully');
        }
        return back()->with('loginError', 'Different passwords, please try again');
    }
}
