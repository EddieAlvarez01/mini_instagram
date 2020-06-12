<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/my-images', 'HomeController@myImages')->name('home.myImages');

//RUTAS DE EL USUSARIO
Route::group(['prefix' => 'user'], function(){
    Route::get('show-edit', 'UserController@showEdit');
    Route::put('update-user', 'UserController@updateUser');
    Route::get('show-profile/{id}', 'UserController@showProfile')->where([
        'id' => '[0-9]+'
    ]);
    Route::get('show-profile-user/{id}', 'UserController@showAboutUser')->where([
        'id' => '[0-9]+'
    ]);
});

Route::get('/get-image/{path}/{option}', 'ImageController@getImage')->where([
    'option' => '1|0'
]);

//RUTAS DE LAS IMAGENES SUBIDAS
Route::group(['prefix' => 'image'], function (){
    Route::post('create', 'ImageController@createImage');
});

//RUTAS DE LOS COMENTARIOS
Route::group(['prefix' => 'comment'], function (){
    Route::post('create', 'CommentController@postComment');
    Route::get('delete/{id}', 'CommentController@deleteComment')->where([
        'id' => '[0-9]+'
    ]);
});

//RUTAS DE LOS LIKES
Route::group(['prefix' => 'like'], function (){
    Route::get('like-post/{id}', 'LikeController@likePublication')->where([
        'id' => '[0-9]+'
    ]);
    Route::get('dislike-post/{id}', 'LikeController@dislike')->where([
        'id' => '[0-9]+'
    ]);
});
