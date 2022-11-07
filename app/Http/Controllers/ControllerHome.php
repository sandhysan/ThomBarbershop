<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ControllerHome extends Controller
{
    public function index(Request $request)
    {

        if (Auth()->user()) {
            if (Auth()->user()->role == 'Admin') {
                return redirect('/dashboard');
            } else {
                // $pesan = DB::table('pemesanan')->where('status', 'Pending')->get();
                // return redirect('user.index', compact('pesan'));
            }
        }

        return view('user.index');
    }
}
