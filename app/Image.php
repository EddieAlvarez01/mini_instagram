<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    //NOMBRE DE LA TABLA
    protected $table = 'Image';

    //RELACIONES
    //LLAVE FORANEA DEL USUARIO (MUCHOS A UNO (LA RELACION INVERSA))
    public function user(){
        return $this->belongsTo('App\User');
    }

    //UNO A MUCHOS
    public function comments(){
        return $this->hasMany('App\Comment');
    }

    //LLAVES COMPUESTAS
    //DEBIDO A QUE ELOQUENT NO SOPORTA LAS LLAVES COMPUESTAS SOLO SE MANEJARA COMO UNA TABLA PIVOTE MUCHOS A MUCHOS
    public function likes(){
        return $this->hasMany('App\Like');
    }

}
