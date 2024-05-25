<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Gudang;

use Illuminate\Support\Facades\DB;

class GudangController extends Controller
{

    public function index(Request $request)
    {
        $data['title'] = 'Data Gudang';
        $data['q'] = $request->get('q');
        $data['gudang'] = Gudang::where('nama_gudang', 'like', '%' . $data['q'] . '%')->get();
        return view('gudang.index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Gudang';
        return view('gudang.create', $data);
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
            'nama_gudang' => 'required',
        ]);

        $customer = new Gudang($request->all());
        $customer->save();
        return redirect('gudang')->with('success', 'Sukses Menambah Data Gudang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Gudang $users)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Gudang $gudang)
    {
        $data['title'] = 'Edit Gudang';
        $data['gudang'] = $gudang;
        return view('gudang.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gudang $gudang)
    {
        $request->validate([
            'nama_gudang' => 'required',
        ]);

        $gudang->nama_gudang = $request->nama_gudang;
        $gudang->save();
        return redirect('gudang')->with('success', 'Sukses Mengubah Data Gudang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gudang $gudang)
    {
        $gudang->delete();
        return redirect('gudang')->with('success', 'Sukses Menghapus Data Gudang');
    }
}
