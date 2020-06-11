<?php

namespace App;

use Illuminate\Contracts\Notifications\Dispatcher;
use Illuminate\Database\Eloquent\Model;

class Caballo extends Model
{
    protected $guarded = [];
    protected $dates = ['fechaNacimiento'];

    public static function setFoto($foto) {
        
    }

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
    public function raza() {
        return $this->belongsTo(Raza::class);
    }
    public function disciplinas() {
        
         return $this->belongsToMany(Disciplina::class);
    }
    public function caracters() {
        return $this->belongsToMany(Caracter::class);
    }

    public function scopeUser($query, $user) {
        if($user)
            return $query->where('user_id', 'LIKE', "%$user%");
    }

    public function isborrador() {
        return true;
    }
}
