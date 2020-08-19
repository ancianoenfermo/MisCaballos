<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    public function caballos() {
        return $this->belongsToMany(Caballo::class);
    }
}
