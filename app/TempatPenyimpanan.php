<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempatPenyimpanan extends Model
{
    protected $table = 'tempat_penyimpanan';
    protected $guarded = ['id'];

    public function BarangRumahTangga(){
        return $this->belongsTo('App\BarangRumahTangga');
    }

    public function AlatLatihan(){
        return $this->belongsTo('App\AlatLatihan');
    }
}
