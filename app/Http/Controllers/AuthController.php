<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Hash;
use Illuminate\support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard'
        ]);
    }
    //register form
    public function daftar()
    {
        return view('auth.daftar');
    }
    // store register
    public function store(Request $request, User $user, Auth $auth)
    {
        // dd($request);
        $request->validate([
            'name'  => 'required|string|max:250',
            'email' => 'required|unique:users,email',
            'status'  => 'required',
            'password'  => 'required|confirmed',
            'jumlah_jiwa'  => 'required',
            'asal_tempat'  => 'required',
            'telepon'  => 'required',
            'alamat'  => 'required'
        ]);

        // dd($request);   

        $user->create([
            'name'  => $request->name,
            'email' => $request->email,
            'status' => $request->status,
            'password'  => Hash::make($request->password),
            'jumlah_jiwa' => $request->jumlah_jiwa,
            'asal_tempat' => $request->asal_tempat,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat
        ]);

         $credential = $request->only('email', 'password');
        $auth::attempt($credential);
        $request->session()->regenerate();


        return redirect()->route('dashboard');
    }

    //login form
    public function login()
   {
        return view('auth.login');
   }
//    // authentication
//    public function auth(Request $request, Auth $auth)
//    {
//         // validasi form input
//         $request->validate([
//             'email'  => 'required|email', 
//             'password' => 'required'
//         ]);

//         // proses authentikasi
//         $credential = $request->only('email', 'password');
//         if ($auth::attempt($credential))
//         {
//             $request->session()->regenerate();
//             return redirect()->route('dashboard');
//         }
//         // jika proses authentikasi gagal maka akan di redirect ke halaman login
//         return back()->withErrors([
//             'email' => 'Email atau password tidak ditemukan',
//         ])->onlyInput('email');

//    }
//berubahan login dengan telepon

public function auth(Request $request, Auth $auth)
{
    // validasi form input
    $request->validate([
        'identifier' => 'required',
        'password' => 'required'
    ]);

    // proses authentikasi
    $credential = [
        'password' => $request->password
    ];

    // Cek apakah input adalah email atau nomor telepon
    if (filter_var($request->identifier, FILTER_VALIDATE_EMAIL)) {
        $credential['email'] = $request->identifier;
    } else {
        $credential['telepon'] = $request->identifier;
    }

    if ($auth::attempt($credential))
    {
        $request->session()->regenerate();
        return redirect()->route('dashboard');
    }

    //jika proses authentikasi gagal maka akan di redirect ke halaman login
    return back()->withErrors([
        'identifier' => 'Email, nomor telepon, atau password tidak ditemukan',
    ])->onlyInput('identifier');
}

//  -)
   // dashboard
   public function dashboard()
   {
    if(Auth::check())
    {
        return view('auth.dashboard');
    }

    return redirect()->route('auth.login');
   }
   // logout
   public function logout(Request $request, Auth $auth)
   {
    $auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('auth.login');
   }
}
