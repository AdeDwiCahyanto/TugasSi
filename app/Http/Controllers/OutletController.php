<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Outlet;

use Illuminate\Support\Facades\DB;

class OutletController extends Controller
{

    public function index(Request $request)
    {
        $data['title'] = 'Data Outlet';
        $data['q'] = $request->get('q');
        $data['outlet'] = Outlet::where('nama_outlet', 'like', '%' . $data['q'] . '%')->get();
        return view('outlet.index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Outlet';
        return view('outlet.create', $data);
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
            'nama_outlet' => 'required',
        ]);

        $customer = new Outlet($request->all());
        $customer->save();
        return redirect('outlet')->with('success', 'Sukses Menambah Data Outlet');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Outlet $users)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Outlet $outlet)
    {
        $data['title'] = 'Edit Outlet';
        $data['outlet'] = $outlet;
        return view('outlet.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outlet $outlet)
    {
        $request->validate([
            'nama_outlet' => 'required',
        ]);

        $outlet->nama_outlet = $request->nama_outlet;
        $outlet->save();
        return redirect('outlet')->with('success', 'Sukses Mengubah Data Outlet');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outlet $outlet)
    {
        $outlet->delete();
        return redirect('outlet')->with('success', 'Sukses Menghapus Data Outlet');
    }
}
