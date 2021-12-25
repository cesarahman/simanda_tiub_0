<?php

namespace App;

use App\Models\Kategori;
use App\Models\TempatPenyimpanan;
use Illuminate\Database\Eloquent\Model;

class BarangRumahTangga extends Model
{
    protected $table = 'barang_rumah_tangga';
    protected $guarded = ['id'];

    public function Kategori(){
        return $this->hasMany(Kategori::class);
    }

    public function TempatPenyimpanan(){
        return $this->hasMany(TempatPenyimpanan::class);
    }
}
