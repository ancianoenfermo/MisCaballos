<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CaballosController extends Controller
{
    public function index() {
        return view('admin.caballos.index');
    }
    public function create() {
        return view('admin.caballos.create');
    }
}
