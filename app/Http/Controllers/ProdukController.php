<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::all();
        return view('masuk.Admin.produk', compact('produks'));
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
            'foto' => 'image|file',
            'keterangan' => 'required',
            
        ]);
    
        $fotoPath = $request->file('foto')->store('produk', 'public');

        // Menyimpan data kegiatan beserta path gambar ke database
        Produk::create([
            'judul' => $request->judul,
            'foto' => $fotoPath,
            'keterangan' => $request->keterangan,
        ]);
    
        Alert::success('Sukses', 'Produk berhasil ditambahkan!')->autoClose(3000);
        return redirect()->back()->with('alert', [
            'icon' => 'success',
            'title' => 'Sukses',
            'text' => 'Produk berhasil ditambahkan!',
        ]);   
     }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        // $produk = $produk;
        // return redirect()->route('StatistikController.input_data')->with('produk', $produk);
        // return view('tes', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'judul' => 'required',
            'foto' => 'image|file',
            'keterangan' => 'required',
        ]);
    
        // $produk = Produk::findOrFail($id);
        if ($request->hasFile('foto')) {
            // Jika ada file foto baru, unggaah dan perbarui path gambar
            $fotoPath = $request->file('foto')->store('produk', 'public');
            $produk->update([
                'judul' => $request->judul,
                'foto' => $fotoPath,
                'keterangan' => $request->keterangan,
            ]);
        } else {
            // Jika tidak ada file foto baru, perbarui data lainnya kecuali foto
            $produk->update([
                'judul' => $request->judul,
                'keterangan' => $request->keterangan,
            ]);
        }
        // return view('masuk.Admin.inputData');
        Alert::success('Sukses', 'Produk berhasil diperbarui!')->autoClose(3000);
        return redirect()->back()->with('alert', [
                'icon' => 'success',
                'title' => 'Sukses',
                'text' => 'Produk berhasil diperbarui!',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect()->back()->with('success', 'Petugas berhasil dihapus');
    }
}
