<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    protected $table = 'fakultas';
    protected $guarded = ['id'];

    public function Anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}
