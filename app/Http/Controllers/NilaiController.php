<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Nilai;

use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{

    public function index(Request $request)
    {
        $data['title'] = 'Data Nilai';
        $data['q'] = $request->get('q');
        $data['nilai'] = Nilai::where('nama_nilai', 'like', '%' . $data['q'] . '%')->get();
        return view('nilai.index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Nilai';
        return view('nilai.create', $data);
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
            'nama_nilai' => 'required',
            'bobot_nilai' => 'required',
        ]);

        $customer = new Nilai($request->all());
        $customer->save();
        return redirect('nilai')->with('success', 'Sukses Menambah Data Nilai');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Nilai $users)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilai $nilai)
    {
        $data['title'] = 'Edit Nilai';
        $data['nilai'] = $nilai;
        return view('nilai.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nilai $nilai)
    {
        $request->validate([
            'nama_nilai' => 'required',
            'bobot_nilai' => 'required',
        ]);

        $nilai->nama_nilai = $request->nama_nilai;
        $nilai->bobot_nilai = $request->bobot_nilai;
        $nilai->save();
        return redirect('nilai')->with('success', 'Sukses Mengubah Data Nilai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilai $nilai)
    {
        $nilai->delete();
        return redirect('nilai')->with('success', 'Sukses Menghapus Data Nilai');
    }
}
