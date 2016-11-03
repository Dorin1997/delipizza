<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', "Controller@home" );
Route::get('/articleon',"Controller@arton");
Route::get('/panel',"Controller@articles");
Route::get('/info',"Controller@info");
Route::get('/login',"Controller@logare");
Route::get('/order-{id}',"Controller@oneprodus");


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');


Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/ac', 'Controller@activcom');
Route::get('/ic', 'Controller@inactivcom');
Route::get('/user', 'Controller@utilizatori');
Route::get('/pz', 'Controller@pizza');

Route::get('/update', 'Controller@updpizz');
Route::get('/create', 'Controller@addpizz');