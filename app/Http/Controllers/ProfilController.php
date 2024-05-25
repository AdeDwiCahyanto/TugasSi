<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Profil;

use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{

    public function index(Request $request)
    {
        $data['title'] = 'Data Profil';
        $data['q'] = $request->get('q');
        $data['profil'] = Profil::where('nama_perusahaan', 'like', '%' . $data['q'] . '%')->get();
        return view('profil.index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Profil';
        return view('profil.create', $data);
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
            'nama_perusahaan' => 'required',
            'alamat' => 'required',
            'visi' => 'required',
            'misi' => 'required',
        ]);

        $customer = new Profil($request->all());
        $customer->save();
        return redirect('profil')->with('success', 'Sukses Menambah Data Profil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Profil $users)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Profil $profil)
    {
        $data['title'] = 'Edit Profil';
        $data['profil'] = $profil;
        return view('profil.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profil $profil)
    {
        $request->validate([
            'nama_perusahaan' => 'required',
            'alamat' => 'required',
            'visi' => 'required',
            'misi' => 'required',
        ]);

        $profil->nama_perusahaan = $request->nama_perusahaan;
        $profil->alamat = $request->alamat;
        $profil->visi = $request->visi;
        $profil->misi = $request->misi;
        $profil->save();
        return redirect('profil')->with('success', 'Sukses Mengubah Data Profil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profil $profil)
    {
        $profil->delete();
        return redirect('profil')->with('success', 'Sukses Menghapus Data Profil');
    }
}
