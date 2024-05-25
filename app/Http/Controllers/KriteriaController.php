<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Data Kriteria';
        $kriteria = Kriteria::get();
        return view('kriteria.index', $data, ['data' =>$kriteria]);
    }

    public function create()
    {
        $data['title'] = 'Tambah kriteria';
        return view('kriteria.create', $data);
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
            'nama_kriteria' => 'required',
            'nilai_kriteria' => 'required',
        ]);

        $customer = new Kriteria($request->all());
        $customer->save();
        return redirect('kriteria')->with('success', 'Sukses Menambah Data kriteria');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Kriteria $users)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Kriteria $kriteria)
    {
        $data['title'] = 'Edit Kriteria';
        $data['kriteria'] = $kriteria;
        return view('kriteria.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kriteria $kriteria)
    {
        $request->validate([
            'nama_kriteria' => 'required',
            'nilai_kriteria' => 'required',
        ]);

        $kriteria->nama_kriteria = $request->nama_kriteria;
        $kriteria->nilai_kriteria = $request->nilai_kriteria;
        $kriteria->save();
        return redirect('kriteria')->with('success', 'Sukses Mengubah Data kriteria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kriteria $kriteria)
    {
        $kriteria->delete();
        return redirect('kriteria')->with('success', 'Sukses Menghapus Data kriteria');
    }
}