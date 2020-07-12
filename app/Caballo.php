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
    protected $dates = ['fechaNacimiento','fechaPublicacion'];

    public static function setFotoPortada($fotoPortada, $actual = false) {
       
        if($fotoPortada) {
            if($actual != 'Caballo.png') {
                Storage::disk('public')->delete('imagenes/portadas/'.$actual);
            }
            $imageName = Str::random(20).'.jpg';
            
            $imagen = Image::make($fotoPortada)->encode('jpg',75);
            $imagen->resize(100,100, function($constraint){
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
    public function raza() {
        return $this->belongsTo(Raza::class);
    }
    public function sexo() {
        return $this->belongsTo(Sexo::class);
    }
    
    public function concurso() {
        return $this->belongsTo(Concurso::class);
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

    public function scopeComunidad($query, $comunidad_s) {
        if($comunidad_s) 
            return $query->where('comunidad_id','=',"$comunidad_s");
    }
    public function scopeSexo($query, $sexo_s) {
        if($sexo_s) 
            return $query->where('sexo_id','=',"$sexo_s");
    }
    public function scopeRaza($query, $raza_s) {
        if($raza_s) 
            return $query->where('raza_id','=',"$raza_s");
    }
    public function scopeCapa($query, $capa_s) {
        if($capa_s) 
            return $query->where('capa_id','=',"$capa_s");
    }
    public function scopeConcurso($query, $concurso_s) {
        if($concurso_s) 
            return $query->where('concurso_id','=',"$concurso_s");

    }
    public function scopeCaracter($query, $caracter_s)
    {
        if($caracter_s) 
            return $query->whereHas('caracters', function ($query) use ($caracter_s) {
                $query->where('caballo_caracter.caracter_id', $caracter_s);
            });
    }
    public function scopeDisciplina($query, $disciplina_s)
    {
        if($disciplina_s) 
            return $query->whereHas('disciplinas', function ($query) use ($disciplina_s) {
                $query->where('caballo_disciplina.disciplina_id', $disciplina_s);
            });
    }


}
