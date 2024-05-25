<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginownerController extends Controller
{

    public function loginUser2(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::guard('owner')->attempt($credentials)) {
            // Jika autentikasi berhasil, alihkan ke halaman dashboard user 2
            return redirect()->intended('/owner/dashboard');
        } else {
            // Jika autentikasi gagal, tampilkan pesan error
            return back()->withErrors(['username' => 'username atau password salah.']);
        }
    }
}
