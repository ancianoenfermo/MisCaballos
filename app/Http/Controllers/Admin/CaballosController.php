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
use App\Raza;
use App\Sexo;
use App\User;
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
    

    public function store(Request $request) {
        $this->validate($request, ['name' => 'required']);
        $caballo = Caballo::create([
            'name' => $request->get('name'),
            'user_id' => Auth()->user()->id                 
        ]);

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
        'disciplinas','razas','caballo','disciplinasActuales','carcatersActuales','concursos','fotoPortada','fotosCaballo'));
    }

   
    
   
   
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
                'fotoPortada' => 'required',
                'body' => 'required',
                'comunidad' => 'required',
                'raza' => 'required',
                'sexo' => 'required',
                'capa' => 'required',
                'disciplinas' => 'required',
                'caracters' => 'required',
                'concursos' => 'required'
            ]);
            $caballo->fechaPublicacion = Carbon::now();
        }
        
        /* $request->request->add(['fotoPortada'=> 'myFotoAAAA']); */
        
        if($foto = Caballo::setFotoPortada($request->foto_up, $caballo->fotoPortada))
            $request->request->add(['fotoPortada'=> $foto]);
        
        /* dd($request->all(), $caballo->fotoPortada); */


        $caballo->name = $request->get('name');
        
        $date = date("Y-m-d", strtotime($request->get('fechaNacimiento')));
        $caballo->user_id = Auth()->user()->id;
        $caballo->fechaNacimiento = $date;
        $caballo->alzada = $request->get('alzada');
        $caballo->alzadaEstimada = $request->get('alzadaEstimada');
        $caballo->body = $request->get('body');
        $caballo->fotoPortada = $request->get('fotoPortada');
        $caballo->comunidad_id = $request->get('comunidad');
        $caballo->sexo_id = $request->get('sexo');
        $caballo->capa_id = $request->get('capa');
        $caballo->raza_id = $request->get('raza');
        $caballo->concurso_id = $request->get('concurso');
        $caballo->save();

        $caballo->disciplinas()->sync($request->get('disciplinas'));
        $caballo->caracters()->sync($request->get('caracters'));
        
        if ($request->get('tipo') == 'borrador') {
            return back()->with('flash', 'Tu caballo ha sido guardado como borrador, sigue trabajando');
         } else {
            return back()->with('flash', 'Tu caballo ha sido publicado ¡enhorabuena!'); 
         }
        
    }
    public function destroy(Caballo $caballo) {
        $caballo->disciplinas()->detach();
        $caballo->caracters()->detach();
        
        $caballo->delete();

        return redirect()->route('admin.caballos.index')->with('flash','El caballo ha sido eliminado');
    }
}
