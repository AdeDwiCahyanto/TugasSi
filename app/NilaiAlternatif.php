<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiAlternatif extends Model
{
    protected $table        = 'nilai_alternatif';
//    protected $fillable     = ['nama_crip','nilai_crip'];
    protected $hidden       = ['created_at','updated_at'];
    public function penilaian() {
        return $this->belongsTo(\App\Penilaian::class,'id_penilaian');
    }
    public function alternatif() {
        return $this->belongsTo(\App\Alternatif::class,'id_alternatif');
    }
}
