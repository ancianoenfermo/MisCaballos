<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VansController extends Controller
{
    public function index() {
        return view('admin.vans.index');
    }

    public function create() {
        return view('admin.vans.create');
    }
}
