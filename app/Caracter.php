<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caracter extends Model
{
    public function caballos() {
        return $this->belongsToMany(Caballo::class);
    }
}
