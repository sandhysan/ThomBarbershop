<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Days;
use App\Models\User;
use App\Models\Waktu;
use App\Models\Layanan;
use App\Models\Karyawan;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ControllerBooking extends Controller
{
    public function index(Request $request)
    {
        $karyawan = Karyawan::all();
        $layanan = Layanan::all();
        $waktu = Waktu::all();

        $q = DB::table('pemesanan')->select(DB::raw('MAX(RIGHT(no_book,3)) as kode'));
        $kd = "";

        if ($q->count() > 0) {
            foreach ($q->get() as $k) {
                $tmp = ((int)$k->kode) + 1;
                $kd = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "001";
        }

        $count = sizeof($layanan);
        for ($i = 0; $i < $count; $i++) {
            if ($request->key == $i) {
                $style = $layanan[$i];
                return view('user.book', compact(
                    'style',
                    'karyawan',
                    'layanan',
                    'waktu',
                    'kd'
                ));
            }
        }
    }


    public function indexbooking()
    {
        $karyawan = Karyawan::all();
        $layanan = Layanan::all();
        $waktu = Waktu::all();

        $q = DB::table('pemesanan')->select(DB::raw('MAX(RIGHT(no_book,3)) as kode'));
        $kd = "";

        if ($q->count() > 0) {
            foreach ($q->get() as $k) {
                $tmp = ((int)$k->kode) + 1;
                $kd = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "001";
        }

        return view('user.book-2', compact(
            'karyawan',
            'layanan',
            'waktu',
            'kd'
        ));
    }


    public function hair()
    {
        $layanan = Layanan::all();

        return view('user.hairstyle', [
            'layanan' => $layanan
        ]);
    }

    public function store(Request $request)
    {
        $text = "Pending";
        $cek = Pemesanan::where('jam', 'like', $request->time)->where('jadwal', 'like', $request->jadwal)->where('status', 'like', 'Pending')->first();

        if (isset($cek)) {
            return back()->with('pesan', 'This time someone already ordered, please choose another time.');
        } else {
            $kd = $request->kd;
            $tglpesan = Carbon::now();
            $userid = Auth::user()->id;
            $emplyd = Karyawan::all();
            $style = Layanan::all();
            $rambut = $request->layanan;
            $harga = $request->harga;
            $jadwal = $request->jadwal;
            $time = $request->time;
            $pekerja = $request->employee;
            $ket = $request->ket;
            $status = "Pending";


            return view('user.confir', compact('rambut', 'harga', 'jadwal', 'time', 'pekerja', 'ket', 'tglpesan', 'emplyd', 'style', 'kd', 'status'));
        }
        return back();
    }

    public function savebook(Request $request)
    {
        $tglpesan = Carbon::now();
        $userid = Auth::user()->id;
        $pesan = Pemesanan::create([
            'no_book' => $request->kd,
            'namalyn' => $request->layanan,
            'hargalyn' => $request->harga,
            'namakywn' => $request->employee,
            'jadwal' => $request->jadwal,
            'jam' => $request->time,
            'keterangan' => $request->ket,
            'tgl_pesan' => $tglpesan,
            'status' => "Pending",
            'id_user' => $userid
        ]);

        $details = ['pesan' => $pesan, 'user' => Auth::user()];

        Mail::to(auth()->user()->email)->send(new \App\Mail\ConfirmBook($details));

        return redirect('/riwayatbook')->with('pesan', 'Successfull Booking');
    }


    public function viewOrder()
    {
        $this->middleware('auth');
        $dataJam = Waktu::get();
        $dataSQL = Pemesanan::where('id_user', 'like', auth()->user()->id)->simplePaginate(6);
        // dd($dataSQL);
        return view('user.riwayatbook', compact('dataJam', 'dataSQL'));
    }

    public function reschedule(Request $request)
    {
        $this->middleware('auth');
        $request->validate([
            'jadwal' => 'required',
            'jam' => 'required'
        ]);

        $jadwalbook = Pemesanan::find($request->id);
        $data['dataJam'] = Waktu::get();
        $data['dataSQL'] = Pemesanan::where('id_user', 'like', auth()->user()->id)->simplePaginate(6);

        $cek = Pemesanan::where('jam', 'like', $request->jam)->where('jadwal', 'like', $request->jadwal)->first();

        if (isset($cek)) {
            return back()->with('pesangagal', 'This time someone already ordered, please choose another time.');
        }

        if (isset($jadwalbook)) {
            $jadwalbook->jadwal = $request->jadwal;
            $jadwalbook->jam = $request->jam;
            $jadwalbook->save();
            return redirect('/riwayatbook')->with('pesan', 'Reschedule Successfully');
        }
    }

    public function listBook()
    {
        $dataBooking = DB::select("SELECT CONCAT(nama,'_',jam) as title, jadwal as start, jadwal as end
        FROM pemesanan
        INNER JOIN users ON pemesanan.id_user = users.id  WHERE status ='Pending' OR status ='Confirmed' ORDER BY jadwal ASC");

        return view('user.listbooking', compact('dataBooking'));
    }

    public function cancel($id)
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
}
