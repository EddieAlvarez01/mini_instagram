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

//RUTAS DE EL USUSARIO
Route::group(['prefix' => 'user'], function(){
    Route::get('show-edit', 'UserController@showEdit');
    Route::put('update-user', 'UserController@updateUser');
});

Route::get('/get-image/{path}/{option}', 'ImageController@getImage')->where([
    'option' => '1|0'
]);

//RUTAS DE LAS IMAGENES SUBIDAS
Route::group(['prefix' => 'image'], function (){
    Route::post('create', 'ImageController@createImage');
});
