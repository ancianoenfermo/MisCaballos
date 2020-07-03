<?php

namespace App\Http\Requests;

use App\Caballo;
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
        return [
            'name' => 'required',
            'fechaNacimiento' => 'required',
            'alzada' => 'required',
            'body' => 'required',
            'comunidad' => 'required',
            'raza' => 'required',
            'sexo' => 'required',
            'capa' => 'required',
            'disciplinas' => 'required',
            'caracters' => 'required',
        ];
    }
}

