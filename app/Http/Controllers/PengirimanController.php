<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Data Pengiriman';
        $pengiriman = Pengiriman::get();
        return view('pengiriman.index', $data, ['data' =>$pengiriman]);
    }

    public function create()
    {
        $data['title'] = 'Tambah Pengiriman';
        $barang = Barang::all();
        $kategori = Kategori::all();
        return view('pengiriman.create', $data, compact('barang', 'kategori'));
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
            'id_barang' => 'required',
            'id_kategori' => 'required',
            'jumlah_pengiriman' => 'required',
            'tanggal_pengiriman' => 'required',
            'lokasi_awal' => 'required',
            'lokasi_tujuan' => 'required',
        ]);

        $customer = new Pengiriman($request->all());
        $customer->save();
        return redirect('pengiriman')->with('success', 'Sukses Menambah Data Pengiriman');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Pengiriman $users)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengiriman $pengiriman)
    {
        $data['title'] = 'Edit Pengiriman';
        $data['pengiriman'] = $pengiriman;
        $barang = Barang::all();
        $kategori = Kategori::all();
        return view('pengiriman.edit', $data, compact('barang', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengiriman $pengiriman)
    {
        $request->validate([
            'id_barang' => 'required',
            'id_kategori' => 'required',
            'jumlah_pengiriman' => 'required',
            'tanggal_pengiriman' => 'required',
            'lokasi_awal' => 'required',
            'lokasi_tujuan' => 'required',
        ]);

        $pengiriman->id_barang = $request->id_barang;
        $pengiriman->id_kategori = $request->id_kategori;
        $pengiriman->jumlah_pengiriman = $request->jumlah_pengiriman;
        $pengiriman->tanggal_pengiriman = $request->tanggal_pengiriman;
        $pengiriman->lokasi_awal = $request->lokasi_awal;
        $pengiriman->lokasi_tujuan = $request->lokasi_tujuan;
        $pengiriman->save();
        return redirect('pengiriman')->with('success', 'Sukses Mengubah Data Pengiriman');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengiriman $pengiriman)
    {
        $pengiriman->delete();
        return redirect('pengiriman')->with('success', 'Sukses Menghapus Data Pengiriman');
    }
}