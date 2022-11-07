<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Waktu;
use App\Models\Karyawan;
use App\Models\Layanan;
use App\Models\Pemesanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ControllerKelolaBooking extends Controller
{
    public function index()
    {
        $pemesanan =  Pemesanan::with('user', 'layanan', 'waktu', 'karyawan')->simplePaginate(8);
        return view('dashboard.booking', ['pemesanan' => $pemesanan]);
    }

    public function today()
    {
        $tanggalSekarang = date("Y-m-d");
        $pemesanan =  Pemesanan::with('user', 'layanan', 'waktu', 'karyawan')->where('jadwal', $tanggalSekarang)->simplePaginate(8);
        return view('dashboard.todaybook', ['pemesanan' => $pemesanan]);
    }

    public function cariBooking(Request $request)
    {
        $cari = $request->cari;
        $pemesanan = Pemesanan::whereRelation('user', 'nama', 'Like', "%" . $cari . "%")->simplePaginate();
        return view('dashboard.booking', ['pemesanan' => $pemesanan]);
    }

    public function editStatus(Request $request)
    {


        $status = Pemesanan::find($request->id);

        if (isset($status)) {
            $status->status = $request->status;
            $status->jadwal;
            $status->jam;
            $status->namalyn;
            $status->namakywn;
            $status->save();

            $details = ['pesan' => $status];

            if ($status->status == 'Confirmed') {
                Mail::to($status->user->email)->send(new \App\Mail\ConfirmMail($details));
            }


            return redirect('/pemesanan')->with('pesan', 'Edit Successfully!');
        } else {
            return redirect('/pemesanan')->with('pesangagal', 'Failed to Edit!');
        }
    }

    public function editStatusToday(Request $request)
    {


        $status = Pemesanan::find($request->id);

        if (isset($status)) {
            $status->status = $request->status;
            $status->jadwal;
            $status->jam;
            $status->namalyn;
            $status->namakywn;
            $status->save();

            $details = ['pesan' => $status];

            if ($status->status == 'Confirmed') {
                Mail::to($status->user->email)->send(new \App\Mail\ConfirmMail($details));
            }


            return redirect('/todaybook')->with('pesan', 'Edit Successfully!');
        } else {
            return redirect('/todaybook')->with('pesangagal', 'Failed to Edit!');
        }
    }


    public function hapus($id)
    {
        $delete = Pemesanan::destroy($id);

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Cancel successfully";
        } else {
            $success = true;
            $message = "Not found";
        }

        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }


    public function listBooking()
    {
        $dataBooking = DB::select("SELECT CONCAT(nama,'_',jam) as title, jadwal as start, jadwal as end
        FROM pemesanan
        INNER JOIN users ON pemesanan.id_user = users.id WHERE status ='Pending' OR status ='Confirmed' ORDER BY jadwal ASC");


        return view('dashboard.listbooking', compact('dataBooking'));
    }
}
