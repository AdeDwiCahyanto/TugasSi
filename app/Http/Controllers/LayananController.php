<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Data Layanan';
        $data['q'] = $request->get('q');
        $data['layanan'] = Layanan::where('nama_layanan', 'like', '%' . $data['q'] . '%')->get();
        return view('layanan.index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah layanan';
        return view('layanan.create', $data);
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
            'nama_layanan' => 'required',
            'harga_layanan' => 'required',
            'estimasi' => 'required',
            'ongkir' => 'required',
            'diskon' => 'required',
        ]);

        $customer = new Layanan($request->all());
        $customer->save();
        return redirect('layanan')->with('success', 'Sukses Menambah Data layanan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Layanan $users)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Layanan $layanan)
    {
        $data['title'] = 'Edit layanan';
        $data['layanan'] = $layanan;
        return view('layanan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Layanan $layanan)
    {
        $request->validate([
            'nama_layanan' => 'required',
            'harga_layanan' => 'required',
            'estimasi' => 'required',
            'ongkir' => 'required',
            'diskon' => 'required',
        ]);

        $layanan->nama_layanan = $request->nama_layanan;
        $layanan->harga_layanan = $request->harga_layanan;
        $layanan->estimasi = $request->estimasi;
        $layanan->ongkir = $request->ongkir;
        $layanan->diskon = $request->diskon;
        $layanan->save();
        return redirect('layanan')->with('success', 'Sukses Mengubah Data layanan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Layanan $layanan)
    {
        $layanan->delete();
        return redirect('layanan')->with('success', 'Sukses Menghapus Data layanan');
    }
}