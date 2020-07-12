<?php

namespace App\Http\Controllers;

use App\Caballo;
use App\Capa;
use App\Caracter;
use App\Comunidad;
use App\Concurso;
use App\Disciplina;
use App\Raza;
use App\Sexo;
use Carbon\Carbon;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class PagesController extends Controller
{
    public function home() {
       
        return(view('PaginaHome'));
    }

    public function admin() {
        return view('admin.paneldecontrol');
    }
    
    public function caballos(Request $request) {
       
        $comunidad_s = $request->input('comunidad_s');
        $sexo_s      = $request->input('sexo_s');
        $raza_s      = $request->input('raza_s');
        $capa_s      = $request->input('capa_s');
        $concurso_s  = $request->input('concurso_s');
        $caracter_s  = $request->input('caracter_s');
        $disciplina_s = $request->input('disciplina_s');
        
        $caballos = Caballo::latest()
            ->whereNotNull('fechaPublicacion')
            ->comunidad($comunidad_s)
            ->sexo($sexo_s)
            ->raza($raza_s)
            ->capa($capa_s)
            ->concurso($concurso_s)
            ->caracter($caracter_s)
            ->disciplina($disciplina_s)
            ->paginate(4)->appends($request->all());
       
        $now = Carbon::now();
        $comunidades = Comunidad::all();
        $sexos = Sexo::all();
        $razas = Raza::all();
        $capas = Capa::all();
        $concursos = Concurso::all();
        $caracters = Caracter::all();
        $disciplinas = Disciplina::all();

        return(view('listadoCaballos',compact('caballos','now','comunidades','sexos','razas','capas','concursos','caracters','disciplinas','comunidad_s','sexo_s','raza_s','capa_s','concurso_s','caracter_s','disciplina_s')));
    }

}
