<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

class PenggunaController extends Controller
{

    public function index(Request $request)
    {
        $data['title'] = 'Data Pengguna';
        $data['q'] = $request->get('q');
        $data['pengguna'] = User::where('name', 'like', '%' . $data['q'] . '%')->get();
        return view('pengguna.index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Pelanggan';
        return view('pengguna.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $customer = new User($request->all());
        $customer->save();
        return redirect('pengguna')->with('success', 'Sukses Menambah Data Pengguna');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(User $users)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(User $pengguna)
    {
        $data['title'] = 'Edit Pengguna';
        $data['pengguna'] = $pengguna;
        return view('pengguna.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $pengguna)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $pengguna->name = $request->name;
        $pengguna->username = $request->username;
        $pengguna->password = Hash::make($request->password);
        $pengguna->save();
        return redirect('pengguna')->with('success', 'Sukses Mengubah Data Pengguna');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $pengguna)
    {
        $pengguna->delete();
        return redirect('pengguna')->with('success', 'Sukses Menghapus Data Pengguna');
    }
}
