<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';
    protected $guarded = ['$id'];

    public function Fakultas()
    {
        return $this->hasMany(Fakultas::class);
    }

    public function Agama()
    {
        return $this->hasMany(Agama::class);
    }

    public function Tingkatan()
    {
        return $this->hasMany(Tingkatan::class);
    }
}
