<?php

namespace App\Http\Controllers;

use App\Alternatif;
use App\Kriteria;
use Illuminate\Http\Request;

class RangkingController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::all();
        $alternatif = Alternatif::all();
        $kode_krit = [];
        foreach ($kriteria as $krit)
        {
            $kode_krit[$krit->id_kriteria] = [];
            foreach ($alternatif as $al)
            {
                foreach ($al->crip as $crip)
                {
                        if ($crip->kriteria->id_kriteria == $krit->id_kriteria)
                        {
                            $kode_krit[$krit->id_kriteria][] = $crip->nilai_penilaian;
                        }
                }
            }

            if ($krit->jenis == 'cost')
            {
                $kode_krit[$krit->id_kriteria] = min($kode_krit[$krit->id_kriteria]);
            } elseif ($krit->jenis == 'benefit')
            {
                $kode_krit[$krit->id_kriteria] = max($kode_krit[$krit->id_kriteria]);
            }
        };
//        return json_encode($kode_krit);
        return view('rangking.index',[
            'kriteria'      => $kriteria,
            'alternatif'    => $alternatif,
            'kode_krit'     => $kode_krit
        ]);
    }
}
