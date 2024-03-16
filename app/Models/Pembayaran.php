<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email_P',
        'asal',
        'total_pembayaran', 
        'tahun',
        'tanggal',
        'bulan_dipilih',
    ];
    public function setBulanDipilihAttribute($value)
    {
        $this->attributes['bulan_dipilih'] = json_encode($value);
    }

    // Menggunakan fitur accessors untuk mengambil bulan-dipilih sebagai array
    public function getBulanDipilihAttribute($value)
    {
        return json_decode($value, true);
    }
    
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $created_at = $model->created_at;

            // Parse timestamp dari kolom created_at
            $timestamp = Carbon::parse($created_at);

            // Set zona waktu ke 'Asia/Jakarta'
            $timestamp->setTimezone('Asia/Jakarta');

            // Mengisi kolom 'hari', 'tanggal', dan 'jam' dengan data dari created_at
            $model->attributes['tanggal'] = $timestamp->translatedFormat('j F Y');
        });
    }
}