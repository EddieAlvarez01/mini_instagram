<?php

namespace App\Http\Controllers;

use App\Image;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $information = [
            'id' => Auth::id(),
            'name' => Auth::user()->name . ' ' . Auth::user()->surname,
            'nickname' => Auth::user()->nickname,
            'email' => Auth::user()->email
        ];
        return view('profile.edit', [
            'image_p' => $image_p,
            'information' => $information
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

    //MOSTRAR PERFIL
    public function showProfile($id){
        if(Auth::id() == $id){
            $image_p = Auth::user()->image;
            $information = [
                'id' => Auth::id(),
                'name' => Auth::user()->name . ' ' . Auth::user()->surname,
                'nickname' => Auth::user()->nickname,
                'email' => Auth::user()->email
            ];
            return view('profile.my', ['image_p' => $image_p, 'information' => $information]);
        }else{
            $user = User::find($id);
            $image_p = $user->image;
            $information = [
                'id' => $user->id,
                'name' => $user->name . ' ' . $user->surname,
                'nickname' => $user->nickname,
                'email' => $user->email
            ];
            $images = Image::where('user_id', $id)->orderBy('created_at', 'desc')->paginate(6);
        }
        return view('profile.user', ['image_p' => $image_p, 'information' => $information, 'images' => $images]);
    }

    //INFORMACION DE PERFILES QUE NO SON DEL USUARIO
    public function showAboutUser($id){
        $user = User::find($id);
        $image_p = $user->image;
        $information = [
            'id' => $user->id,
            'name' => $user->name . ' ' . $user->surname,
            'nickname' => $user->nickname,
            'email' => $user->email
        ];
        $images = Image::where('user_id', $id)->orderBy('created_at', 'desc')->paginate(6);
        return view('profile.about', ['image_p' => $image_p, 'information' => $information, 'images' => $images]);
    }

    //VISTA PARA CAMBIAR CONTRASEÑA
    public function showChangePassword(){
        $image_p = Auth::user()->image;
        $information = [
            'id' => Auth::id(),
            'name' => Auth::user()->name . ' ' . Auth::user()->surname,
            'nickname' => Auth::user()->nickname,
            'email' => Auth::user()->email
        ];
        return view('profile.password', ['image_p' => $image_p, 'information' => $information]);
    }

    //CAMBIAR CONTRASEÑA DEL USUARIO
    public function updatePassword(Request $req){
        $req->validate([
            'oldPassword' => ['required', 'string'],
            'password' => ['required', 'string', 'confirmed']
        ]);
        $oldPassword = $req->input('oldPassword');
        if(Hash::check($oldPassword, Auth::user()->password)){      //VERIFICAMOS EL MATCH DE LA CONTRASEÑA ECRIPTADA Y EL TEXTO PLANO
            $user = User::find(Auth::id());                         //BUSCAMOS EL USUARIO
            $pass = Hash::make($req->input('password'));        //ENCRIPTAMOS CONTRASEÑA
            $user->password = $pass;
            $user->save();                                          //SE GUARDAN LOS CAMBIOS
            Auth::user()->password = Hash::make($pass);
            return redirect()->action('UserController@showChangePassword')->with('alert-success', 'contraseña cambiada exitosamente');
        }
        return redirect()->back()->with('alert-error', 'Error la contraseña actual no es correcta');
    }

}
