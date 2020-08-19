<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use phpDocumentor\Reflection\Types\This;

class Anuncio extends Model
{
    protected $guarded = [];
   
    public function setTransporteAttribute($value) {
        $this->attributes['transporte'] = ($value == 'on') ? true : false;
    }
   
    public function precio() {
        return $this->belongsTo(Precio::class);
    }
    public function caballo() {
        return $this->belongsTo(Caballo::class);
    }
     
}
