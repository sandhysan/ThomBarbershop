<?php

namespace App\Http\Controllers;

use App\Models\Days;
use App\Models\Waktu;
use Illuminate\Http\Request;

class ControllerWaktu extends Controller
{
    public function hari()
    {
        $days = Days::all();
        return view('dashboard.hari', ['days' => $days]);
    }

    public function waktu()
    {
        $waktu = Waktu::all();
        return view('dashboard.waktu', ['waktu' => $waktu]);
    }

    public function storeHari(Request $request)
    {

        Days::create([
            'hari' => $request->hari
        ]);


        return redirect('/hari')->with('pesan', 'Added Successfully!');
    }

    public function storeWaktu(Request $request)
    {

        Waktu::create([
            'jam' => $request->jam
        ]);


        return redirect('/waktu')->with('pesan', 'Added Successfully!');
    }

    public function editHari(Request $request)
    {
        $days = Days::find($request->id);
        // dd($days);

        if (isset($days)) {
            $days->hari = $request->hari;
            $days->save();

            return redirect('/hari')->with('pesan', 'Edit Successfully!');
        } else {
            return redirect('/hari')->with('pesangagal', 'Failed to Edit!');
        }
    }

    public function editWaktu(Request $request)
    {
        $waktu = Waktu::find($request->id);
        // dd($days);

        if (isset($waktu)) {
            $waktu->jam = $request->jam;
            $waktu->save();

            return redirect('/waktu')->with('pesan', 'Edit Successfully!');
        } else {
            return redirect('/waktu')->with('pesangagal', 'Failed to Edit!');
        }
    }

    public function hapusHari($id)
    {
        $data = Days::find($id);
        if (isset($data)) {
            $data->delete();
            return back()->with('pesan', 'Data deleted successfully!');
        }
        return back()->with('pesangagal', 'Failed to delete');
    }

    public function hapusWaktu($id)
    {
        $data = Waktu::find($id);
        if (isset($data)) {
            $data->delete();
            return back()->with('pesan', 'Data deleted successfully!');
        }
        return back()->with('pesangagal', 'Failed to delete');
    }
}
