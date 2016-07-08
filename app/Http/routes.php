<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|


Route::get('/', function () {
    return view('welcome');
});

*/
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

Route::get('auth/login', ['as'=>'login','uses'=>'Auth\AuthController@getLogin']);
Route::get('login', 'Auth\AuthController@getLogin'); //@todo for url fetting redirect to only /login
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', ['as'=>'logout','uses'=>'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', ['as'=>'register','uses' =>'Auth\AuthController@postRegister']);

Route::get('home', 'HomeController@index');

Route::get('books',['middleware' => 'auth','uses' => 'BookController@index'] );
Route::get('books/edit/{id}',['as'=>'books.edit','middleware' => 'auth','uses' => 'BookController@edit'] );
Route::get ('books/destroy/{id}',['as'=>'books.destroy','middleware' => 'auth','uses' => 'BookController@destroy'] );
Route::get('books/create',['as'=>'books.create','middleware' => 'auth','uses' => 'BookController@create'] );
Route::get('books/update/{id}',['as'=>'books.update','middleware' => 'auth','uses' => 'BookController@update'] );