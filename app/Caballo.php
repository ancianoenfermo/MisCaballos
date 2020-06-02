<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caballo extends Model
{
    protected $guarded = [];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function capa(){
        return $this->belongsTo(Capa::class);
    }
    public function comunidad(){
        return $this->belongsTo(Comunidad::class);
    }
    public function precio(){
        return $this->belongsTo(Precio::class);
    }
    public function caballos() {
        return $this->hasMany(Caballo::class);
    }
    public function disciplinas() {
        return $this->belongsToMany(Disciplina::class);
    }
    public function tags() {
        return $this->belongsToMany(Caracter::class);
}

}
