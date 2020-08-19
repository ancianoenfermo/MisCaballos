<?php

namespace App\Http\Controllers\Admin;

use App\Photo;
use App\Caballo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Environment\Console;
use Intervention\Image\ImageManagerStatic as Image;

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
            Storage::disk('public')->put("userfiles/$caballo->user_id/$imageName", $foto->stream());
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
        
    public function ruta() {
        
        return response()->json(['location'=>'imagenes/1/new-location.png']);
    }
    public  function destroy(Request $request) {
        $photoId = $request->get('key');
        $photo = Photo::find($photoId);
        if (!$photo) { abort (404); }
        $photoUrl = $photo->url;
        $photo->delete();
        $userId = Auth::id();
        
        Storage::disk('public')->delete("userfiles/$userId/".$photoUrl);
        
        return ['tokrn' => "hhhhh"]; 

    }
}
