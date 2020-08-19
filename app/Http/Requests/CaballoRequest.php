<?php

namespace App\Http\Requests;

use App\Caballo;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\FormRequest;

class CaballoRequest extends FormRequest
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
           
            $rules = [
                'name' => 'required',
                ];
        } else {
            
            $rules = [
                'name' => 'required',
                'fechaNacimiento' => 'required',
                'alzada' => 'required',
                'comunidad' => 'required',
                'raza' => 'required',
                'sexo' => 'required',
                'capa' => 'required',
                'disciplinas' => 'required',
                'caracters' => 'required',
                'concurso' => 'required'
            ];
        }
       
       return $rules;     
    }
    function create_caballo() {
        $stringUrl = $this->get('name');
        
        $rnd = rand(10, 99);
        
        $stringUrl = Str::of($stringUrl)->slug().'-'.$rnd;
        
            
        /* 'name' => $this->get('name'), */
        
        
        
        $caballo = Caballo::create([
            'name' => $this->get('name'),
            'urlClean' => $stringUrl,
            'estado' => 'PRIVADO',
            'fotoPortada' => 'Caballo.png',
            'user_id' => Auth()->user()->id                 
        ]);
        
        return $caballo;
    }

    function update_caballo(Caballo $caballo) {
      
       
        if($foto = Caballo::setFotoPortada($this->fotoPortada, $caballo->fotoPortada))
        $this->request->add(['fotoPortada'=> $foto]);
        if ($this->get('estado') == 'PUBLICO') {  
            if ($caballo->fechaPublicacion == null) {  
                $fechaPublicacion = Carbon::now();
                $fechaActualizacion = null;
            } else {
                $fechaPublicacion = $caballo->fechaPublicacion;
                $fechaActualizacion = Carbon::now();
            } 
           
        } else {
            $fechaPublicacion = null;
            $fechaActualizacion= null;
        }
           
        
  
        DB::transaction(function () use($caballo, $fechaPublicacion, $fechaActualizacion) {
        
            $caballo->name = $this->get('name');
            
            $date = date("Y-m-d", strtotime($this->get('fechaNacimiento')));
            $caballo->user_id = Auth()->user()->id;
            $caballo->fechaNacimiento = $date;
            $caballo->alzada = $this->get('alzada');
            $caballo->alzadaEstimada = $this->get('alzadaEstimada');
            $caballo->body = $this->get('body');
            if($this->fotoPortada) {
                $caballo->fotoPortada = $this->get('fotoPortada');
            }
            $caballo->comunidad_id = $this->get('comunidad');
            $caballo->sexo_id = $this->get('sexo');
            $caballo->capa_id = $this->get('capa');
            $caballo->raza_id = $this->get('raza');
            $caballo->concurso_id = $this->get('concurso');
            $caballo->estado = $this->get('estado');
            $caballo->fechaPublicacion = $fechaPublicacion;
            $caballo->fechaActualizacion = $fechaActualizacion;
            $caballo->disciplinas()->sync($this->get('disciplinas'));
            $caballo->caracters()->sync($this->get('caracters'));
            $caballo->save();
            
        });

        


    }
}

