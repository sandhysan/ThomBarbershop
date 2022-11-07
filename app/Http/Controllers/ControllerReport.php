<?php

namespace App\Http\Controllers;

use App\Exports\BookingExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Models\Pemesanan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerReport extends Controller
{
    public function index()
    {
        $pemesanan =  Pemesanan::with('user', 'layanan', 'waktu', 'karyawan')->simplePaginate(8);
        return view('dashboard.laporan', compact('pemesanan'));
    }

    public function printPDF(Request $request)
    {
        $tglawal = $request->tgl_awal;
        $tglakhir = $request->tgl_akhir;
        $jarak = [$tglawal, $tglakhir];
        $sql =  Pemesanan::whereBetween('jadwal', $jarak)->orderBy('jadwal', 'asc')->get();
        $no = 1;
        $total = 0;
        $date = Carbon::now();
        foreach ($sql as $item) {
            $total = $total + $item->hargalyn;
        }
        $pdf = PDF::loadView('dashboard.cetakreport', ['sql' => $sql, 'no' => $no, 'total' => $total, 'date' => $date])->setPaper('a4', 'landscape');
        return $pdf->download('incomereport.pdf');
        // return view('dashboard.cetakreport', ['sql' => $sql, 'no' => $no, 'total' => $total]);
    }

    public function export()
    {
        return Excel::download(new BookingExport, 'booking.xlsx');
    }
}
