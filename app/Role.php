<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //TABLA A MODIFICAR OPCIONAL, PUEDE QUE EL MODELO YA SE LLAME COMO LA TABLA
    protected $table = 'Role';

    //TIMESTAMPS CREATED_AT Y UPDATED_AT NO EXISTEN EN LAS TABLAS
    public $timestamps = false;

    //UNO A MUCHOS
    public function users(){
        return $this->hasMany('App\User');
    }

}
