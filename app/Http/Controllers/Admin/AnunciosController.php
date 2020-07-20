<?php

namespace App\Http\Controllers\admin;

use App\Anuncio;
use App\Caballo;
use App\Comunidad;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnuncioRequest;
use App\Precio;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AnunciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /*  $caballos = auth()->user()->caballos; */
        $anuncios = auth()->user()->anuncios;

        $caballos = Caballo::whereNotIn('id', function($q){
            $q->select('caballo_id')->from('anuncios');
        })->get();
        
        return view('admin.anuncios.index', compact('anuncios','caballos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd("no deberías estar");
    }

    
     
    public function store(AnuncioRequest $request)
    {  
        $anuncio = $request->create_anuncio();
        return redirect()->route('admin.anuncios.edit',$anuncio);
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit(Anuncio $anuncio)
    {
        $fechaActual = Carbon::now();
        $caballo = Caballo::find("$anuncio->caballo_id");
        $precios =Precio::all();
       
        return view('admin.anuncios.edit',compact('precios','anuncio','fechaActual'));
    }

   
    public function update(Anuncio $anuncio,AnuncioRequest $request )
    {   
        $request->update_anuncio($anuncio);
        return back()->with('flash', 'Tu anuncio ha sido guardado'); 
    }

   
    public function destroy(Anuncio $anuncio)
    {
        $anuncio->delete();

        return redirect()->route('admin.anuncios.index')->with('flash','El anuncio ha sido eliminado');
    }
}
