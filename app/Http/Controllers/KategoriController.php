<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;

use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{

    public function index(Request $request)
    {
        $data['title'] = 'Data Kategori';
        $data['q'] = $request->get('q');
        $data['kategori'] = Kategori::where('nama_kategori', 'like', '%' . $data['q'] . '%')->get();
        return view('kategori.index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Kategori';
        return view('kategori.create', $data);
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
            'nama_kategori' => 'required',
        ]);

        $customer = new Kategori($request->all());
        $customer->save();
        return redirect('kategori')->with('success', 'Sukses Menambah Data Kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $users)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        $data['title'] = 'Edit Kategori';
        $data['kategori'] = $kategori;
        return view('kategori.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
        return redirect('kategori')->with('success', 'Sukses Mengubah Data kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect('kategori')->with('success', 'Sukses Menghapus Data Kategori');
    }
}
