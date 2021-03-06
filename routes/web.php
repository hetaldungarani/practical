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

Route::get('/', function(){
	return Redirect::to('login');
});
Route::get('login', 'AuthController@index')->name('login');
Route::get('users', 'UserController@index');
Route::post('post-login', 'AuthController@postLogin'); 
Route::get('register', 'AuthController@register');
Route::get('send_request', 'UserController@send_request');
Route::get('search_user', 'UserController@search_user');
Route::post('post-register', 'AuthController@postRegister'); 
Route::post('logout', 'AuthController@logout');
