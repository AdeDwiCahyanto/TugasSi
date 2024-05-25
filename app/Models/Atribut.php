<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atribut extends Model
{
    use HasFactory;

    protected $table = 'atribut';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_atribut', 'nilai_atribut'];
}
