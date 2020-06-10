<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

    //CONTIENE UNA LLAVE PRIMARIA COMPUESTA SIM EMBARGO ELOQUENT NO LO SOPORTA, NO SE PONDRA DE MANERA EXPLICITA EN EL ORM
    protected $primaryKey = null;

    public $incrementing = false;

    //TABLA
    protected $table = 'Likes';

    //RELACIONES
    //IMAGENES
    public function image(){
        return $this->belongsTo('App\Image');
    }

    //USUARIOS
    public function user(){
        return $this->belongsTo('App\User');
    }

}
