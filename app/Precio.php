<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    public function caballos() {
        return $this->hasMany(Caballo::class);
    }
}
