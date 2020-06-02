<?php

namespace App\Http\Controllers\Admin;

use App\Caballo;
use App\Capa;
use App\Caracter;
use App\Comunidad;
use App\Disciplina;
use App\Http\Controllers\Controller;
use App\Raza;
use App\Sexo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CaballosController extends Controller
{
    public function index() {
       
    $caballos = Caballo::all();
    
        return view('admin.caballos.index', compact('caballos'));
    }
    public function create() {
        
        $sexos = Sexo::all();
        $capas = Capa::all();
        $caracters = Caracter::all();
        $comunidades = Comunidad::all();
        $disciplinas = Disciplina::all();
        $razas = Raza::all();
        return view('admin.caballos.create', compact('sexos','capas','caracters','comunidades','disciplinas','razas'));
    }

    public function store(Request $request) {
            
       
        $caballo = new Caballo;
        $caballo->name = $request->get('name');
        $caballo->fechaNacimiento = null;
        $caballo->alzada = $request->get('alzada');
        $caballo->alzadaEstimada = $request->get('alzadaEstimada');
        $caballo->textoDestacado = $request->get('textoDestacado');
        $caballo->body = $request->get('body');
        $caballo->comunidad_id = $request->get('comunidad');
        $caballo->sexo_id = $request->get('sexo');
        $caballo->capa_id = $request->get('capa');
        $caballo->save();

        $caballo->disciplinas()->attach($request->get('disciplinas'));
        $caballo->caracters()->attach($request->get('caracters'));
        return back()->with('flash', 'Tu caballo ha sido creado');
    }
}
