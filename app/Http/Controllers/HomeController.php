<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $images = Image::orderBy('created_at', 'desc')->paginate(6);
        return view('home', ['images' => $images]);
    }

    //MUESTRA SOLO LAS IMAGENES DEL USUSARIO EN SESION
    public function myImages(){
        $images = Image::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(6);
        return view('home', ['images' => $images]);
    }
}
