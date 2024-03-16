<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'keterangan',
        'hari',
        'tanggal',
        'jam',
    ];

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
            $model->attributes['hari'] = $timestamp->translatedFormat('l');
            $model->attributes['tanggal'] = $timestamp->translatedFormat('j F Y');
            $model->attributes['jam'] = $timestamp->format('H:i');
        });
    }
}
