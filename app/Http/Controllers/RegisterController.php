<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function registerUser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|username|max:255',
            'password' => 'required|min:8|max:255',
            'level' => 'required|level|max:255'
        ]);

        $user = new User();
        $user->name = $validatedData['name'];
        $user->username = $validatedData['username'];
        $user->password = Hash::make($validatedData['password']);
        $user->level = $validatedData['level'];
        $user->save();

        return redirect('/login')->with('success', 'Registrasi berhasil!');
    }
}
