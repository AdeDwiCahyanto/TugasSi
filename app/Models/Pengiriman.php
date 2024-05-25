<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;

    protected $table = 'pengiriman';
    protected $primaryKey = 'id_pengiriman';
    protected $fillable = ['id_barang', 'id_kategori', 'jumlah_pengiriman', 'tanggal_pengiriman', 'lokasi_awal','lokasi_tujuan'];
    public function barang()
    {

        return $this->belongsTo(Barang::class, 'id_barang');
    }
    public function kategori()
    {

        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
