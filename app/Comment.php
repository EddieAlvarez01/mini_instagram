<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $table = 'Comment';

    //RELACIONES
    //USUARIOS
    public function user(){
        return $this->belongsTo('App\User');
    }

    //IMAGENES
    public function image(){
        return $this->belongsTo('App\Image');
    }

}
