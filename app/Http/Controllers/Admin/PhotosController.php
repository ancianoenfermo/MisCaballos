<?php

namespace App\Http\Controllers\Admin;

use App\Caballo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    public function store(Caballo $caballo, Request $request ) {
        
        $this->validate(request(), [
            'photo' => 'image|max:2048'
        ]);
        
        $photo = request()->file('photo');
       
        $photoUrl = $photo->store('public');
        return Storage::url($photoUrl);

    }
}
