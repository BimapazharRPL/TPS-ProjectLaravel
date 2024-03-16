<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistik extends Model
{
    use HasFactory;

    protected $fillable = [
        'pengurus', 
        'pelanggan',
        'sudah_bayar',
        'belum_bayar',
        'pengumpulan_S',
        'residu_S',
        'perusahaan', 
        'rumah',
        'kantor',
        'toko',
        'warung',
        'sekolah',
    ];
}
