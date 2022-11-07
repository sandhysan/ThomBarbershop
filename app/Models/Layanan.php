<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = 'layanan';
    use HasFactory;

    protected $fillable = [
        'id',
        'nama_lyn',
        'image_lyn',
        'harga_lyn'
    ];

    public function layanan()
    {
        return $this->hasOne(Pemesanan::class, 'id');
    }
}
