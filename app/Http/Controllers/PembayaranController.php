<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class PembayaranController extends Controller
{
    public function admin()
     {
        $pembayarans = Pembayaran::orderBy('id', 'desc')->get();
         return view('masuk.pembayaran', compact('pembayarans'));
     }

    public function index()
     {
        //  $pembayarans = Pembayaran::all();
        $pembayarans = Pembayaran::orderBy('id', 'desc')->get();
         return view('masuk.Pembayaran.index', compact('pembayarans'));
     }

     public function create()
     {
         // Menggunakan array bulan untuk memudahkan pembaruan di masa mendatang
         $bulanList = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

         return view('masuk.Pembayaran.form', compact('bulanList'));
     }
     

     public function store(Request $request)
     {
         $request->validate([
             'bulan' => 'required|array|min:1',
             'tahun' => 'required',
         ]);
     
         $bulanDipilih = $request->input('bulan');
     
         $tempat = Auth::user()->asal_tempat; // Mendapatkan nama pengguna dari pengguna yang diautentikasi

         if ($tempat == "Rumah") {
             $tarif = 20000;
         } elseif ($tempat == "Perusahaan") {
             $tarif = 500000;
         } elseif ($tempat == "Kantor") {
             $tarif = 80000;
        } elseif ($tempat == "Warung") {
            $tarif = 25000;
        } elseif ($tempat == "Sekolah") {
            $tarif = 50000;
         } else {
             // Default jika nama pengguna tidak sesuai dengan kondisi di atas
             $tarif = 70000;
         }
     
         $totalPembayaran = count($bulanDipilih) * $tarif;
     
         // Membuat Order ID unik dengan timestamp dan angka acak
         $order_id = 'ORDER_' . time() . '_' . uniqid();
     
         $pembayaran = new Pembayaran([
             'order_id' => $order_id,
             'tahun' => $request->input('tahun'),
             'nama'  => Auth::user()->name,
             'email_P'  => Auth::user()->email,
             'asal'  => Auth::user()->asal_tempat,
             'bulan_dipilih' => $bulanDipilih,
         ]);
     
         $pembayaran->total_pembayaran = $totalPembayaran;
         $pembayaran->save();
     
         // Set up Midtrans configuration
         \Midtrans\Config::$serverKey = config('midtrans.server_key');
         \Midtrans\Config::$isProduction = false;
         \Midtrans\Config::$isSanitized = true;
         \Midtrans\Config::$is3ds = true;
     
         // Create Midtrans transaction parameters
         $params = [
             'transaction_details' => [
                 'order_id' => $order_id,
                 'gross_amount' => $totalPembayaran,
             ],
             'customer_details' => [
                 'name' => $pembayaran->nama,
                 'email' => $pembayaran->email_P,
             ],
         ];
     
         // Get Snap Token from Midtrans
         $snapToken = \Midtrans\Snap::getSnapToken($params);
     
         // Redirect to the detail page with the Snap Token
         return redirect()
             ->route('Pembayaran.detail', ['id' => $pembayaran->id])
             ->with(compact('snapToken'));
     }
     


     public function detail($id)
     {
         $pembayaran = Pembayaran::findOrFail($id);
         $bulanList = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
         $snapToken = session('snapToken', null);

         return view('masuk.Pembayaran.detail', compact('pembayaran', 'bulanList', 'snapToken'));
     }

     public function callback(Request $request) {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("SHA512",$request->$order_id.$request->$status_code.$request->$gross_amount.$serverKey);
        if($hashed == $request->signature_key) {
            if($request->$transaction_status == 'capture') {
                $pembayaran = Pembayaran::find($request->$order_id);
                $pembayaran->update(['status' => 'paid']);
            }
        }
     }

}

// public function store(Request $request)
// {
//     $request->validate([
//         'bulan' => 'required|array|min:1',
//         'tahun' => 'required',
//     ]);

//     $bulanDipilih = $request->input('bulan');

//     $totalPembayaran = count($bulanDipilih) * 30000;

//     $pembayaran = new Pembayaran([
//         'tahun' => $request->input('tahun'),
//         'nama'  => Auth::user()->name,
//         'email_P'  => Auth::user()->email,
//         'asal'  => Auth::user()->asal_tempat,
//         'bulan_dipilih' => $bulanDipilih,
//     ]);

//     $pembayaran->total_pembayaran = $totalPembayaran;
//     $pembayaran->save();
// //   Dari Midtrans
//         // Set your Merchant Server Key
//         \Midtrans\Config::$serverKey = config('midtrans.server_key');\Midtrans\Config::$serverKey = config('midtrans.server_key');
//         // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
//         \Midtrans\Config::$isProduction = false;
//         // Set sanitization on (default)
//         \Midtrans\Config::$isSanitized = true;
//         // Set 3DS transaction for credit card to true
//         \Midtrans\Config::$is3ds = true;

//         $params = array(
//             'transaction_details' => array(
//                 'order_id' => $pembayaran->id,
//                 'gross_amount' => $pembayaran->total_pembayaran,
//             ),
//             'customer_details' => array(
//                 'name' => $pembayaran->nama,
//                 'email' => $pembayaran->email_P,
//             ),
//         );

//         $snapToken = \Midtrans\Snap::getSnapToken($params);
        
//         // $pembayaran = Pembayaran::all();
//         // $bulanList = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
//         // return view('masuk.Pembayaran.detail', compact('pembayaran', 'bulanList', 'snapToken'));
//         return redirect()
//         ->route('Pembayaran.detail', ['id' => $pembayaran->id])
//         ->with(compact('snapToken'));
//     }
     
