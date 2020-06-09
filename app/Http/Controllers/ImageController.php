<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //RECUPERA LAS IMAGENES DEL SERVIDOR
    public function getImage($name){
        $file = Storage::disk('users')->get($name);
        return new Response($file, 200);
    }

}
