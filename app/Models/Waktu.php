<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waktu extends Model
{
    protected $table = 'waktu';
    use HasFactory;

    protected $fillable = [
        'id',
        'jam'
    ];

    public function waktu()
    {
        return $this->hasOne(Pemesanan::class, 'id');
    }
}
