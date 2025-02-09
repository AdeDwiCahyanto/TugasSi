<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    use HasFactory;

    protected $table = 'gudang';
    protected $primaryKey = 'id_gudang';
    protected $fillable = ['nama_gudang'];
    public function barang()
    {

        return $this->hasMany(Barang::class, 'id_kategori');
    }
}
