<?php

namespace App\Http\Controllers;

use App\Caballo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home() {
       
        return(view('PaginaHome'));
    }

    public function admin() {
        return view('admin.paneldecontrol');
    }
    public function caballos() {
        $caballos = Caballo::paginate();
        $now = Carbon::now();
        return(view('listadoCaballos',compact('caballos','now')));
    }


}
 