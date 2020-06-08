<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    //TABLA
    protected $table = 'User';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'surname', 'nickname', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //RELACIONES
    //ROLES
    public function role(){
        return $this->belongsTo('App\Role');
    }

    //IMAGENES
    public function images(){
        return $this->hasMany('App\Image');
    }

    //COMENTARIOS
    public function comments(){
        return $this->hasMany('App\Comment');
    }

    //LIKES
    public function likes(){
        return $this->hasMany('App\Like');
    }
}
