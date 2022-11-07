<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    use HasFactory;

    protected $fillable = [
        'id',
        'nama',
        'email',
        'foto',
        'notelp',
        'tgl_lahir',
        'alamat'
    ];

    public function karyawan()
    {
        return $this->hasOne(Pemesanan::class, 'id');
    }
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
