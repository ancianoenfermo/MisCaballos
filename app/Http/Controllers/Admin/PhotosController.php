<?php

namespace App\Http\Controllers\Admin;

use App\Caballo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Photo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use PhpParser\Node\Stmt\Return_;
use SebastianBergmann\Environment\Console;

class PhotosController extends Controller
{
    public function store(Caballo $caballo, Request $request ) {
       
       
        
        /* $this->validate(request(), [
            'photo' => 'image|max:2048'
        ]); */
        /* $imageName = $request->file->getClientOriginalName(); */
        //$request->file->move(public_path('fotos'),$imageName);
        
        foreach ($request->photosUp as $photo) { 
            $imageName = Str::random(20).'.jpg';
            $foto = Image::make($photo);
            Storage::disk('public')->put("imagenes/fotos/$imageName", $foto->stream());
            $caballo->photos()->create([
                'url' => $imageName,       
             ]);
            
            return response()->json(['uploaded'=>'/fotos/'.$imageName]);
        } 
       
        /* $imageName = Str::random(20).'.jpg';
        $foto = Image::make($request->photosUp[0]); */
      
        /* $fotoCompress = Image::make($foto)->encode('jpg',75); */
        /* Esta funciono Storage::disk('public')->put("imagenes/fotos/$imageName", $foto->stream()); */
        //Storage::disk('public')->put("imagenes/fotos/$imageName", $request->photosUp);
        
        /* return response()->json(['uploaded'=>'/fotos/'.$imageName]); */
        
       
        
         /* 'url' => request()->file('photo')->store('fotos','public'),  */
       
       
   
        }
    public  function destroy(Photo $photo) {
      
       
        $photo->delete();
        
        Storage::disk('public')->delete($photo->url);

        return back()->with('flash','Foto eliminada');


    }
}
