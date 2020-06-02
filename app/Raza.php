<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Raza extends Model
{
    public function caballos() {
        return $this->hasMany(Caballo::class);
    }
}
