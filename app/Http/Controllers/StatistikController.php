<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statistik;
use RealRashid\SweetAlert\Facades\Alert;



class StatistikController extends Controller
{
    // public function statistik()
    // {
    //     $statistikData = Statistik::all();
    //     return view('statistik', compact('statistikData'));
    // }

    public function input_data()
    {
        return view('masuk.Admin.inputData');
    }
    
    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'jumlahPengurus' => 'required',
        'jumlahPelanggan' => 'required',
    ]);

    // Cek apakah entri sudah ada
    $existingStatistik = Statistik::first();

    // Jika entri sudah ada, update data; jika tidak, buat entri baru
    if ($existingStatistik) {
        $existingStatistik->update([
            'pengurus' => $request->jumlahPengurus,
            'pelanggan' => $request->jumlahPelanggan,
        ]);
    } else {
        Statistik::create([
            'pengurus' => $request->jumlahPengurus,
            'pelanggan' => $request->jumlahPelanggan,
        ]);
    }

    // Tambahkan pesan sukses atau redirect sesuai kebutuhan
    Alert::success('Sukses', 'Data berhasil di simpan!')->autoClose(3000);
    return redirect()->back()->with('alert', [
            'icon' => 'success',
            'title' => 'Sukses',
            'text' => 'Data berhasil di simpan!',
        ]);
}

    public function simpan(Request $request)
    {
        // Validasi input
        $request->validate([
            'sudah_bayar' => 'required',
            'belum_bayar' => 'required',
        ]);

        // Cek apakah entri sudah ada
        $existingStatistik = Statistik::first();

        // Jika entri sudah ada, update data; jika tidak, buat entri baru
        if ($existingStatistik) {
            $existingStatistik->update([
                'sudah_bayar' => $request->sudah_bayar,
                'belum_bayar' => $request->belum_bayar,
            ]);
        } else {
            Statistik::create([
                'sudah_bayar' => $request->sudah_bayar,
                'belum_bayar' => $request->belum_bayar,
            ]);
        }

        // Tambahkan pesan sukses atau redirect sesuai kebutuhan
        Alert::success('Sukses', 'Data berhasil di simpan!')->autoClose(3000);
        return redirect()->back()->with('alert', [
                'icon' => 'success',
                'title' => 'Sukses',
                'text' => 'Data berhasil di simpan!',
            ]);   
         }

    public function storey(Request $request)
    {
        // Validasi input
        $request->validate([
            'perusahaan' => 'required',
            'rumah' => 'required',
            'kantor' => 'required',
            'toko' => 'required',
            'warung' => 'required',
            'sekolah' => 'required',
        ]);
    
        // Cek apakah entri sudah ada
        $existingStatistik = Statistik::first();
    
        // Jika entri sudah ada, update data; jika tidak, buat entri baru
        if ($existingStatistik) {
            $existingStatistik->update([
                'perusahaan' => $request->perusahaan,
                'rumah' => $request->rumah,
                'kantor' => $request->kantor,
                'toko' => $request->toko,
                'warung' => $request->warung,
                'sekolah' => $request->sekolah,
            ]);
            $message = 'Data berhasil diperbarui.';
        } else {
            Statistik::create([
                'perusahaan' => $request->perusahaan,
                'rumah' => $request->rumah,
                'kantor' => $request->kantor,
                'toko' => $request->toko,
                'warung' => $request->warung,
                'sekolah' => $request->sekolah,
            ]);
            $message = 'Data berhasil disimpan.';
        }
    
        // Tambahkan pesan sukses atau redirect sesuai kebutuhan
        Alert::success('Sukses', 'Data berhasil di simpan!')->autoClose(3000);
    return redirect()->back()->with('alert', [
            'icon' => 'success',
            'title' => 'Sukses',
            'text' => 'Data berhasil di simpan!',
        ]);
    }

    public function simpanS(Request $request)
    {
        // Validasi input
        $request->validate([
            'pengumpulan_S' => 'required',
            'residu_S' => 'required',
        ]);

        // Cek apakah entri sudah ada
        $existingStatistik = Statistik::first();

        // Jika entri sudah ada, update data; jika tidak, buat entri baru
        if ($existingStatistik) {
            $existingStatistik->update([
                'pengumpulan_S' => $request->pengumpulan_S,
                'residu_S' => $request->residu_S,
            ]);
        } else {
            Statistik::create([
                'pengumpulan_S' => $request->pengumpulan_S,
                'residu_S' => $request->residu_S,
            ]);
        }

        // Tambahkan pesan sukses atau redirect sesuai kebutuhan
        Alert::success('Sukses', 'Data berhasil di simpan!')->autoClose(3000);
    return redirect()->back()->with('alert', [
            'icon' => 'success',
            'title' => 'Sukses',
            'text' => 'Data berhasil di simpan!',
        ]);
    }

    // public function index()
    // {
    //     $produks = Produk::all();
    //     return view('masuk.Admin.inputData', compact('produks'));
    // }
    
    
}
