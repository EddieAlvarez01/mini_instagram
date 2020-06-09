<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //MOSTRAR FORMULARIO DE EDICIÓN DE DATOS DEL USUARIO
    public function showEdit(){
        $image_p = Auth::user()->image;     //VARIABLE PARA PASARLE UNA IMAGEN DEPENDIENDO DEL PERFIL O DEL MISMO USUARIO LOGEADO
        return view('profile.edit', [
            'image_p' => $image_p
        ]);
    }

    //RECIBE LOS PARAMETROS DEL FORMULARIO DE EDICION
    public function updateUser(Request $req){

        //VALIDAR CAMPOS
        $validateData = $req->validate([
            'name' => ['required', 'string', 'max:200'],
            'surname' => ['required', 'string','max:200'],
            'email' => ['required', 'string', 'email', 'max:200'],
            'image' => ['image']
        ]);

        //SUBIR LA IMAGEN
        $image_path = $req->file('image');
        $image = Auth::user()->image;
        if($image_path){
            $image_split = Storage::putFile('users', $image_path, 'public');  //GUARDA LA IMAGEN Y DEVUELVE EL PATH + UN ID UNICO
            $image_split = explode('/', $image_split);
            $image = $image_split[1];

            if(Auth::user()->image != ''){     //SI NO ESTABA USANDO LA IMAGEN POR DEFECTO BORRAMOS LA IMAGEN DE ANTES PARA QUE NO OCUPE ESPACIO
                Storage::disk('users')->delete(Auth::user()->image);
            }
        }
        $name = $req->input('name');
        $surname = $req->input('surname');
        $email = $req->input('email');
        $user = User::find(Auth::id()); //conseguir el usuario identificado
        $user->name = $name;
        $user->surname = $surname;
        $user->email = $email;
        $user->image = $image;
        $user->save();  //GUARDA LOS CAMBIOS EN LA BASE DE DATOS
        Auth::user()->name = $name;
        Auth::user()->surname = $name;
        Auth::user()->email = $email;
        return redirect()->action('UserController@showEdit')
                            ->with('alert-success', 'Cambios guardados exitosamente');
    }

}
