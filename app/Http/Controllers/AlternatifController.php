<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Data Alternatif';
        $data['q'] = $request->get('q');
        $data['alternatif'] = Alternatif::where('nilai_alternatif', 'like', '%' . $data['q'] . '%')->get();
        return view('alternatif.index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah alternatif';
        return view('alternatif.create', $data);
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
            'nilai_alternatif' => 'required',
            'nama_truk' => 'required',
            'nama_supir' => 'required',
        ]);

        $customer = new Alternatif($request->all());
        $customer->save();
        return redirect('alternatif')->with('success', 'Sukses Menambah Data alternatif');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Alternatif $users)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Alternatif $alternatif)
    {
        $data['title'] = 'Edit Alternatif';
        $data['alternatif'] = $alternatif;
        return view('alternatif.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alternatif $alternatif)
    {
        $request->validate([
            'nilai_alternatif' => 'required',
            'nama_truk' => 'required',
            'nama_supir' => 'required',
        ]);

        $alternatif->nilai_alternatif = $request->nilai_alternatif;
        $alternatif->nama_truk = $request->nama_truk;
        $alternatif->nama_supir = $request->nama_supir;
        $alternatif->save();
        return redirect('alternatif')->with('success', 'Sukses Mengubah Data alternatif');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alternatif $alternatif)
    {
        $alternatif->delete();
        return redirect('alternatif')->with('success', 'Sukses Menghapus Data alternatif');
    }
}