<?php

namespace App;

use Illuminate\Contracts\Notifications\Dispatcher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class Caballo extends Model
{
    protected $guarded = [];
    protected $dates = ['fechaNacimiento'];

    public static function setFotoPortada($fotoPortada, $actual = false) {
        
        if($fotoPortada) {
            if($actual) {
                Storage::disk('public')->delete('imagenes/portadas/'.$actual);
            }
            $imageName = Str::random(20).'.jpg';
            
            $imagen = Image::make($fotoPortada)->encode('jpg',75);
            $imagen->resize(500,500, function($constraint){
                $constraint->upsize();
            });
            Storage::disk('public')->put("imagenes/portadas/$imageName", $imagen->stream());
            return $imageName;
        } else {
            return false;
        }
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

    public function photos() {
        return $this->hasMany(Photo::class);
    }

    public function isborrador() {
        return true;
    }
}
