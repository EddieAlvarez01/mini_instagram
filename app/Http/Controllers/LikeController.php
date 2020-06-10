<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //DAR LIKE A UNA PUBLICACIÓN
    public function likePublication($id){

        //COMPROBAR QUE EL USER NO PUEDA DAR DOS LIKES A UNA PUBLICACION ESPECIALEMENTE POR LA URL
        $exist = Like::where([['image_id', '=', $id], ['user_id', '=', Auth::id()]])->count();
        if($exist == 0){

            //GUARDAR EL LIKE EN LA BD
            $like = new Like();
            $like->image_id = $id;
            $like->user_id = Auth::id();
            $like->save();
        }
        return redirect()->action('HomeController@index');
    }

    //QUITAR EL LIKE DE LA PUBLICACION
    public function dislike($id){
        Like::where([['image_id', '=', $id], ['user_id', '=', Auth::id()]])->delete();
        return redirect()->action('HomeController@index');
    }

}
