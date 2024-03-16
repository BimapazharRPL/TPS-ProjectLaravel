<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kegiatans = Kegiatan::all();
        return view('masuk.Admin.kegiatan', compact('kegiatans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'judul' => 'required',
        'foto' => 'image|file', // Menambahkan validasi untuk gambar
        'keterangan' => 'required',
    ]);

    // Mengunggah gambar ke direktori public/storage
    $fotoPath = $request->file('foto')->store('kegiatan', 'public');

    // Menyimpan data kegiatan beserta path gambar ke database
    Kegiatan::create([
        'judul' => $request->judul,
        'foto' => $fotoPath,
        'keterangan' => $request->keterangan,
    ]);

    Alert::success('Sukses', 'Kegiatan berhasil ditambahkan!')->autoClose(3000);
    return redirect()->back()->with('alert', [
        'icon' => 'success',
        'title' => 'Sukses',
        'text' => 'Kegiatan berhasil ditambahkan!',
    ]);
}

    /**
     * Display the specified resource.
     */
    public function show(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kegiatan $kegiatan)
    {
        $editKegiatan = $kegiatan;
        return view('masuk.Admin.inputData', compact('editKegiatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kegiatan $kegiatan)
{
    $request->validate([
        'judul' => 'required',
        'foto' => 'image|file', // Validasi gambar (opsional)
        'keterangan' => 'required',
    ]);

    if ($request->hasFile('foto')) {
        // Jika ada file foto baru, unggaah dan perbarui path gambar
        $fotoPath = $request->file('foto')->store('kegiatan', 'public');
        $kegiatan->update([
            'judul' => $request->judul,
            'foto' => $fotoPath,
            'keterangan' => $request->keterangan,
        ]);
    } else {
        // Jika tidak ada file foto baru, perbarui data lainnya kecuali foto
        $kegiatan->update([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
        ]);
    }

    Alert::success('Sukses', 'Kegiatan berhasil diperbarui!')->autoClose(3000);
    return redirect()->back()->with('alert', [
            'icon' => 'success',
            'title' => 'Sukses',
            'text' => 'Kegiatan berhasil diperbarui!',
        ]);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();

        return redirect()->back()->with('success', 'Petugas berhasil dihapus');
    }
}
