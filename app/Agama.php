<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    protected $table = 'agama';
    protected $guarded = ['id'];

    public function Anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}

