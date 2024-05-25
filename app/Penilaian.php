<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $table        = 'penilaian';
    protected $fillable     = ['nama_penilaian','nilai_penilaian'];
    public function kriteria() {
        return $this->belongsTo(\App\Kriteria::class,'id_kriteria');
    }
    public function nilai() {
        return $this->belongsTo(\App\NilaiAlternatif::class);
    }
}
