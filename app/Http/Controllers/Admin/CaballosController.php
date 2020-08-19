<?php

namespace App\Http\Controllers\Admin;

use App\Capa;
use App\Raza;
use App\Sexo;
use App\User;
use App\Photo;
use App\Venta;
use App\Precio;
use App\Caballo;
use App\Caracter;
use App\Concurso;
use App\Comunidad;
use Carbon\Carbon;
use App\Disciplina;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use function GuzzleHttp\Promise\all;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CaballoRequest;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Environment\Console;

class CaballosController extends Controller
{
    public function index() {
        
        $caballos = auth()->user()->caballos()->paginate();
        
        return view('admin.caballos.index', compact('caballos'));
    }
    

    public function store(CaballoRequest $request) {
        
        $caballo = $request->create_caballo();
        session()->flash('message',
        [
            'alert' => 'success',
            'text' => 'Caballo creado'
        ]);
        
        return redirect()->route('admin.caballos.index', $caballo);
       
    }
    
    public function edit($slug) {
        
        $caballo = Caballo::where('urlClean','=',$slug)->firstOrFail();

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
        session()->flash('message', 
        [
            'alert' => 'success',
            'text' => 'Caballo eliminado'
        ]);

        return redirect()->route('admin.caballos.index');
    }
    /* public function contentImage(Request $request) {
            
            $request->validate([
                'upload' => 'required'
            ]);
            $filename = time().".".$request->image->extension();
            $request->image->move(public_path('images'), $filename);
    
            $a = response()->json(['default'=>URL::to('/').'/images'.$filename]);
            
            //return response()->json(['default'=>URL::to('/').'/images'.$filename]);

            return array('default' => 'http://miscaballos.test/images/image–default-size.jpg');
                
            
    } */
    public function prueba() {
        return view('admin.caballos.prueba');
    }

    public function fotosprueba($slug) {
        $caballo = Caballo::where('urlClean','=',$slug)->firstOrFail();
        $fotos = Arr::pluck($caballo->photos, 'url','id');
        
        $fotosurl = array();
        $previewConfig = array();
        
        foreach ($caballo->photos as $photo)
        {
            array_push($fotosurl,"http://miscaballos.test/storage/userfiles/$caballo->user_id/".$photo->url);
            
            $b = array('data' => 'ppp');
            $b = preg_replace('/"([a-zA-Z]+[a-zA-Z0-9_]*)":/','$1:',$b);
            
            
            array_push($previewConfig, array('url' => 'http://miscaballos.test/admin/photos', 
            'type' => 'image','key' => $photo->id));
            
            
            
        }
        
        /* foreach ($fotos as $clave=>$value)
        {
            array_push($fotosurl,'http://miscaballos.test/storage/imagenes/fotos/'.$value);
            array_push($previewConfig, array('url' => 'http://miscaballos.test/admin/photos', 'type' => 'image','key' => 244));
        
        } */
       
        $fotosCaballo = json_encode($fotosurl,JSON_UNESCAPED_SLASHES);
        $previewConfig = json_encode($previewConfig,JSON_UNESCAPED_SLASHES);
    
        
        //dd($previewConfig);
        
        return view('admin.caballos.pruebaFotos', compact('caballo','fotosCaballo','previewConfig'));
    }
    public function editorprueba ($slug) {
        $caballo = Caballo::where('urlClean','=',$slug)->firstOrFail();
        
        
        return view('admin.caballos.pruebaEditor', compact('caballo'));
    }

    public function uploadTinyImage(Request $request)
    {
        $validatedData = $request->validate([
            'file' => 'required|file',
        ]);
        $userId = Auth::id();  
        $path = $request->file('file')->store("uploadsTiny/$userId", 'public');
        return ['location' => Storage::url($path)];
    }
    




}
