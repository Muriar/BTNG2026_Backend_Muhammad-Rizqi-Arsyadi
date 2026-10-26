<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mobil extends Model
{
    use HasFactory;

    protected $table = 'mobil';
    protected $fillable = [
        'nama',
        'brand',
        'harga',
        'tahun',
        'transmisi',
        'bahan_bakar',
        'status',
    ];

     protected $casts = [
        'harga' => 'integer',
        'tahun' => 'integer',
    ];
}
