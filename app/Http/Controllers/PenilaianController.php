<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Data Penilaian';
        $data['q'] = $request->get('q');
        $data['penilaian'] = Penilaian::where('nilai_penilaian', 'like', '%' . $data['q'] . '%')->get();
        return view('penilaian.index', $data);
    }

    public function create()
    {
        $data['title'] = 'tambah penilaian';
        return view('penilaian.create', $data);
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
            'nilai_penilaian' => 'required',
        ]);

        $customer = new Penilaian($request->all());
        $customer->save();
        return redirect('penilaian')->with('success', 'Sukses Menambah Data penilaian');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Penilaian $users)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Penilaian $penilaian)
    {
        $data['title'] = 'Edit Penilaian';
        $data['penilaian'] = $penilaian;
        return view('penilaian.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penilaian $penilaian)
    {
        $request->validate([
            'nilai_penilaian' => 'required',
        ]);

        $penilaian->nilai_penilaian = $request->nilai_penilaian;
        $penilaian->save();
        return redirect('penilaian')->with('success', 'Sukses Mengubah Data penilaian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penilaian $penilaian)
    {
        $penilaian->delete();
        return redirect('penilaian')->with('success', 'Sukses Menghapus Data penilaian');
    }
}