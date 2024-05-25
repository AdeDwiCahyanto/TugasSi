<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $table        = 'kriteria';
    protected $fillable     = ['kode_kriteria','nama_kriteria','jenis','nilai_kriteria'];
    protected $hidden       = ['created_at','updated_at'];
    public function penilaian() {
        return $this->hasMany(\App\Penilaian::class);
    }
}

