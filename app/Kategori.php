<?php

namespace App\Models;

use App\AlatLatihan;
use App\BarangRumahTangga;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $guarded = ['id'];

    public function BarangRumahTangga(){
        return $this->belongsTo(BarangRumahTangga::class);
    }

    public function AlatLatihan(){
        return $this->belongsTo(AlatLatihan::class);
    }
}
