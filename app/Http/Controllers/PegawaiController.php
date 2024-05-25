<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Data Pegawai';
        $data['q'] = $request->get('q');
        $data['pegawai'] = Pegawai::where('nama_pegawai', 'like', '%' . $data['q'] . '%')->get();
        return view('pegawai.index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Pegawai';
        return view('pegawai.create', $data);
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
            'nama_pegawai' => 'required',
            'jenis_kelamin' => 'required',
            'jabatan' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $customer = new Pegawai($request->all());
        $customer->save();
        return redirect('pegawai')->with('success', 'Sukses Menambah Data Pegawai');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $users)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        $data['title'] = 'Edit Pegawai';
        $data['pegawai'] = $pegawai;
        return view('pegawai.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'nama_pegawai' => 'required',
            'jenis_kelamin' => 'required',
            'jabatan' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $pegawai->nama_pegawai = $request->nama_pegawai;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->username = $request->username;
        $pegawai->password = $request->password;
        $pegawai->save();
        return redirect('pegawai')->with('success', 'Sukses Mengubah Data Pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect('pegawai')->with('success', 'Sukses Menghapus Data Pegawai');
    }
}