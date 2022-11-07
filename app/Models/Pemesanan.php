<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';
    use HasFactory;

    protected $fillable = [
        'id',
        'no_book',
        'namalyn',
        'hargalyn',
        'namakywn',
        'tgl_pesan',
        'jadwal',
        'jam',
        'keterangan',
        'status',
        'id_user'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'namalyn');
    }

    public function waktu()
    {
        return $this->belongsTo(Waktu::class, 'jam');
    }

    public function karyawan()
    {
        return $this->belongsTo(karyawan::class, 'namakywn');
    }
}
