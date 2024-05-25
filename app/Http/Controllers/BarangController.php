<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Model\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Data Barang';
        $barang = Barang::get();
        return view('barang.index', $data, ['data' =>$barang]);
    }

    public function create()
    {
        $data['title'] = 'Tambah Barang';
        
        return view('barang.create', $data);
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
            'id_kategori' => 'required',
            'nama_barang' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
        ]);

        $customer = new Barang($request->all());
        $customer->save();
        return redirect('barang')->with('success', 'Sukses Menambah Data Barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $users)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        $data['title'] = 'Edit Barang';
        $data['barang'] = $barang;
       
        return view('barang.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'id_kategori' => 'required',
            'nama_barang' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
        ]);

        $barang->id_kategori = $request->id_kategori;
        $barang->nama_barang = $request->nama_barang;
        $barang->harga = $request->harga;
        $barang->jumlah = $request->jumlah;
        $barang->save();
        return redirect('barang')->with('success', 'Sukses Mengubah Data Barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect('barang')->with('success', 'Sukses Menghapus Data barang');
    }
}