<?php

namespace App\Http\Controllers\Admin;

use App\Caballo;
use App\Capa;
use App\Caracter;
use App\Comunidad;
use App\Concurso;
use App\Disciplina;
use App\Http\Controllers\Controller;
use App\Http\Requests\CaballoRequest;
use App\Photo;
use App\Precio;
use App\Raza;
use App\Sexo;
use App\User;
use App\Venta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;

use function GuzzleHttp\Promise\all;

class CaballosController extends Controller
{
    public function index() {
        
        $caballos = auth()->user()->caballos;
        
        return view('admin.caballos.index', compact('caballos'));
    }
    

    public function store(CaballoRequest $request) {
        
        $caballo = $request->create_caballo();
        return redirect()->route('admin.caballos.edit', $caballo);
       
    }
    
    public function edit(Caballo $caballo) {
        
        $sexos = Sexo::all();
        $capas = Capa::all();
        $caracters = Caracter::all();
        $comunidades = Comunidad::all();
        $disciplinas = Disciplina::all();
        $razas = Raza::all();
        $concursos = Concurso::all();
        $precios = Precio::all();
        

        $disciplinasActuales = Arr::pluck($caballo->disciplinas, 'id');
        $carcatersActuales = Arr::pluck($caballo->caracters, 'id');

        $fotos = Arr::pluck($caballo->photos, 'url');
        $fotosurl = array();
        
        foreach ($fotos as $clave=>$value)
        {
            array_push($fotosurl,'http://miscaballos.test/storage/imagenes/fotos/'.$value);
        }
    
       
        $fotosCaballo = json_encode($fotosurl,JSON_UNESCAPED_SLASHES);
        
        return view('admin.caballos.edit', compact('sexos','capas','caracters','comunidades',
        'disciplinas','razas','precios','caballo','disciplinasActuales','carcatersActuales','concursos','fotosCaballo'));
    }

   
    
   
   
    public function update(Caballo $caballo,CaballoRequest $request) {
        
        $request->update_caballo($caballo);
        return back()->with('flash', 'Tu caballo ha sido publicado ¡enhorabuena!'); 
         
        
    }
    public function destroy(Caballo $caballo) {
        $caballo->disciplinas()->detach();
        $caballo->caracters()->detach();
        
        $caballo->delete();

        return redirect()->route('admin.caballos.index')->with('flash','El caballo ha sido eliminado');
    }
}
