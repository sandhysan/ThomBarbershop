<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Days extends Model
{
    protected $table = 'days';
    use HasFactory;

    protected $fillable = [
        'id',
        'hari'
    ];

    public function day()
    {
        return $this->hasOne(Pemesanan::class, 'id');
    }
}
