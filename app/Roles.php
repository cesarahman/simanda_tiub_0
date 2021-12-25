<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';
    protected $guarded = 'id';

    public function user()
    {
        return $this->hasMany(user::class);
    }
}
