<?php

namespace App\Http\Controllers\Admin;

use App\Caballo;
use App\Capa;
use App\Caracter;
use App\Comunidad;
use App\Disciplina;
use App\Http\Controllers\Controller;
use App\Http\Requests\CaballoRequest;
use App\Raza;
use App\Sexo;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CaballosController extends Controller
{
    public function index() {
        
        $caballos = auth()->user()->caballos;
        return view('admin.caballos.index', compact('caballos'));
    }
    /* public function create() {
        
        $sexos = Sexo::all();
        $capas = Capa::all();
        $caracters = Caracter::all();
        $comunidades = Comunidad::all();
        $disciplinas = Disciplina::all();
        $razas = Raza::all();
        return view('admin.caballos.create', compact('sexos','capas','caracters','comunidades','disciplinas','razas'));
    } */

    public function store(Request $request) {
       
        $this->validate($request, ['name' => 'required']);
        $caballo = Caballo::create(['name' => $request->get('name')]);
        return redirect()->route('admin.caballos.edit', $caballo);
    }
    
    public function edit(Caballo $caballo) {
        
        $sexos = Sexo::all();
        $capas = Capa::all();
        $caracters = Caracter::all();
        $comunidades = Comunidad::all();
        $disciplinas = Disciplina::all();
        $razas = Raza::all();

        $disciplinasActuales = Arr::pluck($caballo->disciplinas, 'id');
        $carcatersActuales = Arr::pluck($caballo->caracters, 'id');
       
        /* return $caballo->disciplinas->pluck('id'); */
        
        return view('admin.caballos.edit', compact('sexos','capas','caracters','comunidades','disciplinas','razas','caballo','disciplinasActuales','carcatersActuales'));
    }
   
    /* public function update(CaballoRequest $request) {

        $caballo = new Caballo;
        $caballo->name = $request->get('name');
        
        $date = date("Y-m-d", strtotime($request->get('fechaNacimiento')))
        $caballo->user_id = Auth()->user()->id;
        $caballo->fechaNacimiento = $date;
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
 */
    public function update(Caballo $caballo,Request $request) {
        
        
        if ($request->get('tipo') == 'borrador') {
            $this->validate($request, [
               'name' => 'required'
           ]);
           $caballo->fechaPublicacion = null;
        } else {
            $this->validate($request,[
                'name' => 'required',
                'fechaNacimiento' => 'required',
                'alzada' => 'required',
                'alzada' => 'required',
                'textoDestacado' => 'required',
                'body' => 'required',
                'comunidad' => 'required',
                'raza' => 'required',
                'sexo' => 'required',
                'capa' => 'required',
                'disciplinas' => 'required',
                'caracters' => 'required',
            ]);
            $caballo->fechaPublicacion = Carbon::now();
        }
        
        $caballo->name = $request->get('name');
        
        $date = date("Y-m-d", strtotime($request->get('fechaNacimiento')));
        $caballo->user_id = Auth()->user()->id;
        $caballo->fechaNacimiento = $date;
        $caballo->alzada = $request->get('alzada');
        $caballo->alzadaEstimada = $request->get('alzadaEstimada');
        $caballo->textoDestacado = $request->get('textoDestacado');
        $caballo->body = $request->get('body');
        $caballo->comunidad_id = $request->get('comunidad');
        $caballo->sexo_id = $request->get('sexo');
        $caballo->capa_id = $request->get('capa');
        $caballo->raza_id = $request->get('raza');
        $caballo->save();

        $caballo->disciplinas()->sync($request->get('disciplinas'));
        $caballo->caracters()->sync($request->get('caracters'));

        /* if ($foto = Caballo::setFoto($request->foto)) {
         $request->request->add(['foto'-> $foto]);
        } */
        
        if ($request->get('tipo') == 'borrador') {
            return back()->with('flash', 'Tu caballo ha sido guardado como borrador, sigue trabajando');
         } else {
            return back()->with('flash', 'Tu caballo ha sido publicado ¡enhorabuena!'); 
         }
        
    }
}
