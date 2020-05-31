<?php

namespace App\Http\Controllers\Admin;

use App\Caballo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CaballosController extends Controller
{
    public function index() {
       
    $caballos = Caballo::all();
    
        return view('admin.caballos.index', compact('caballos'));
    }
    public function create() {
        return view('admin.caballos.create');
    }
}
