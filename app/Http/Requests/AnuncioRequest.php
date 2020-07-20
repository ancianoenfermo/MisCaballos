<?php

namespace App\Http\Requests;

use App\Anuncio;
use App\AnuncioVenta;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class AnuncioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->get('estado') == 'PRIVADO') {  
           
            $rules = [];
        } else {
            
            $rules = [
                'textoDestacado' => 'required',
                'precio' => 'required',
            ];
        }
       return $rules;   
    }

    function create_anuncio() {
        
        $anuncio = Anuncio::create([
            'tipo' => $this->get('tipo'),
            'estado' => 'PRIVADO',
            'caballo_id' => $this->get('caballo_id'),
            'transporte' => false,
            'precio_id' => null,

            'user_id' => Auth()->user()->id                 
        ]);         
        
        $anuncio->save();
        return $anuncio;
       
        
    }

    function update_anuncio(Anuncio $anuncio) {
       
       
        if ($this->get('estado') == 'PUBLICO') {  
            if ($anuncio->fechaPublicacion == null) {  
                $fechaPublicacion = Carbon::now();
                $fechaActualizacion = null;
            } else {
                $fechaPublicacion = $anuncio->fechaPublicacion;
                $fechaActualizacion = Carbon::now();
            } 
           
        } else {
            $fechaPublicacion = null;
            $fechaActualizacion= null;
        }

        
        $anuncio->textoDestacado =  $this->get('textoDestacado');
        $anuncio->estado = $this->get('estado');
        $anuncio->fechaPublicacion = $fechaPublicacion;
        $anuncio->fechaActualizacion = $fechaPublicacion;
       
    
        
        
        $anuncio->precio_id =  $this->get('precio');
        $anuncio->transporte = $this->get('transporte');
        
        
       
        $anuncio->save();

    }

}
