<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function nasabah()
    {
        $users = User::whereNotIn('status', ['AdminTPS', 'AnggotaTPS'])->get();
        return view('masuk.Admin.data_nasabah', compact('users'));
    }

    public function admin()
    {
        $users = User::where('status', 'AdminTPS')->get();
        return view('masuk.Admin.data_admin', compact('users'));
    }

         public function petugas()
        {
            $users = User::where('status', 'AnggotaTPS')->get();
            return view('masuk.Admin.data_petugas', compact('users'));
        }

        
}
