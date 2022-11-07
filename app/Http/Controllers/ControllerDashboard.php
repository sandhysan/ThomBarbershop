<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class ControllerDashboard extends Controller
{
    public function index()
    {

        $pemesanan = Pemesanan::where('status', 'Pending')->simplePaginate(5);
        return view('dashboard.dashboard', ['pemesanan' => $pemesanan]);
    }
}
