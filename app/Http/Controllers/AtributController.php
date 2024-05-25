<?php

namespace App\Http\Controllers;

use App\Models\Atribut;
use Illuminate\Http\Request;

class AtributController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Data Atribut';
        $data['q'] = $request->get('q');
        $data['atribut'] = Atribut::where('nama_atribut', 'like', '%' . $data['q'] . '%')->get();
        return view('atribut.index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah atribut';
        return view('atribut.create', $data);
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
            'nama_atribut' => 'required',
            'nilai_atribut' => 'required',
        ]);

        $customer = new Atribut($request->all());
        $customer->save();
        return redirect('atribut')->with('success', 'Sukses Menambah Data atribut');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Atribut $users)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Atribut $atribut)
    {
        $data['title'] = 'Edit Atribut';
        $data['atribut'] = $atribut;
        return view('atribut.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Atribut $atribut)
    {
        $request->validate([
            'nama_atribut' => 'required',
            'nilai_atribut' => 'required',
        ]);

        $atribut->nama_atribut = $request->nama_atribut;
        $atribut->nilai_atribut = $request->nilai_atribut;
        $atribut->save();
        return redirect('atribut')->with('success', 'Sukses Mengubah Data atribut');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Atribut $atribut)
    {
        $atribut->delete();
        return redirect('atribut')->with('success', 'Sukses Menghapus Data atribut');
    }
}