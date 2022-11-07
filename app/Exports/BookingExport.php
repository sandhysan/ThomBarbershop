<?php

namespace App\Exports;

use App\Models\Pemesanan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BookingExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Pemesanan::select('no_book', 'hargalyn', 'jadwal', 'jam', 'status', 'tgl_pesan')->where('status', 'Completed')->get();
    }
    public function headings(): array
    {
        return ["NO BOOKING", "PRICE", "SCHEDULE", "TIME", "STATUS", "BOOKING DATE"];
    }
}
