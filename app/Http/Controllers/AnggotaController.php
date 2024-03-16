<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Absensi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggotas = Anggota::all();
        return view('masuk.Admin.petugas.index', compact('anggotas'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('masuk.Admin.petugas.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'tgl_lahir' => 'required',
        'telepon' => 'required',
        'alamat' => 'required',
    ]);

    Anggota::create($request->all());

    Alert::success('Sukses', 'Petugas berhasil ditambahkan!')->autoClose(3000);
    return redirect()->route('qwertyu.index')->with('alert', [
        'icon' => 'success',
        'title' => 'Sukses',
        'text' => 'Petugas berhasil ditambahkan!',
    ]);
}

    /**
     * Display the specified resource.
     */
    public function show(Anggota $anggota)
    {
        return view('masuk.Admin.petugas.show', compact('anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anggota $qwertyu)
    {
        // dd($qwertyu);
        $anggota = $qwertyu;
        return view('masuk.Admin.petugas.edit', compact('anggota'));
    }

    /**
     * Update the specified resource in storage.
     */
//     public function update(Request $request, Anggota $anggota)
// {
//     $request->validate([
//         'nama' => 'required',
//         'telepon' => 'required',
//         'alamat' => 'required',
//     ]);

//     $anggota->update($request->all());

//     return redirect()->route('qwertyu.index')
//         ->with('success', 'Petugas berhasil diperbarui');
// } 
public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required',
        'tgl_lahir' => 'required',
        'telepon' => 'required',
        'alamat' => 'required',
    ]);

    $anggota = Anggota::findOrFail($id);
    $anggota->update($request->all());

    Alert::success('Sukses', 'Petugas berhasil diperbarui!')->autoClose(3000);
        return redirect()->route('qwertyu.index')->with('alert', [
            'icon' => 'success',
            'title' => 'Sukses',
            'text' => 'Petugas berhasil diperbarui!',
        ]);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anggota $qwertyu)
    {
        $qwertyu->delete();

        Alert::success('Sukses', 'Petugas berhasil dihapus!')->autoClose(3000);
        return redirect()->route('qwertyu.index')->with('alert', [
            'icon' => 'success',
            'title' => 'Sukses',
            'text' => 'Petugas berhasil di hapus!',
        ]);
    }
//     public function destroy(Anggota $qwertyu)
// {
//     // Tampilkan konfirmasi SweetAlert2
//     Alert::warning('Konfirmasi', 'Apakah Anda yakin ingin menghapus data ini?')
//         ->showCancelButton(true)
//         ->showConfirmButton(true)
//         ->confirmButtonText('Ya, Hapus!')
//         ->cancelButtonText('Batal')
//         ->focusCancel(true);

//     // Kirim ID data ke halaman konfirmasi
//     return redirect()->route('qwertyu.index');
// }

// public function confirmDestroy(Anggota $qwertyu)
// {
//     // Hapus data setelah konfirmasi
//     $qwertyu->delete();

//     // Tampilkan pesan sukses
//     Alert::success('Sukses', 'Petugas berhasil dihapus!')->autoClose(3000);

//     // Redirect ke halaman indeks setelah penghapusan
//     return redirect()->route('qwertyu.index');
// }

    public function showForm()
    {
        $anggotas = Anggota::all();
        return view('formAbsen', compact('anggotas'));
    }

        public function storeForm(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
        ]);
        Absensi::create($request->all());
        
        $absen = Absensi::latest()->first(); // Ambil data terakhir yang baru ditambahkan
    return view('sudahHadir', compact('absen'));
    }
}
