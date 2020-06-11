<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class ImageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //RECUPERA LAS IMAGENES DEL SERVIDOR
    public function getImage($name, $option){
        if($option){
            $file = Storage::disk('users')->get($name);
        }else{
            $file = Storage::disk('images')->get($name);
        }
        return new Response($file, 200);
    }

    //SUBE IMAGENES AL SERVIDOR
    public function createImage(Request $req){
        $req->validate([
            'description' => ['string', 'max:5000'],
            'image' => ['required', 'image']
        ]);
        $img = $req->file('image');
        $imgSplit = Storage::putFile('images', $img, 'public');
        $imgSplit = explode('/', $imgSplit);    //SPLIT POR DELIMITADOR '/' PARA SEPARAR EL NOMBRE GENERADO POR LARAVEL
        $path = $imgSplit[1];                           //SE ASIGNA EL NOMBRE CREADO POR LARAVEL, (carpeta/nombre) SE TOMA EL INDICE 1
        $image = new Image();
        $image->user_id = Auth::id();
        $image->path = $path;
        $image->description = $req->input('description');
        $image->save();
        if($req->header('referer') == URL::to('/') . '/my-images'){     //DEPENDIENDO DE QUE URI VENGA LA PETICION SE REDIRRECIONA
            return redirect()->action('HomeController@myImages')->with('alert-success', 'La foto se subió correctamente');
        }
        return redirect()->action('HomeController@index')->with('alert-success', 'La foto se subió correctamente');
    }

}
