<?php

namespace App\Http\Controllers\Admin;

use App\Caballo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Photo;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Return_;

class PhotosController extends Controller
{
    public function store(Caballo $caballo, Request $request ) {
        
        $this->validate(request(), [
            'photo' => 'image|max:2048'
        ]);
        
        $caballo->photos()->create([
            'url' => request()->file('photo')->store('fotos','public'),
        ]);
    }
    public  function destroy(Photo $photo) {
      
       
        $photo->delete();
        
        Storage::disk('public')->delete($photo->url);

        return back()->with('flash','Foto eliminada');


    }
}
