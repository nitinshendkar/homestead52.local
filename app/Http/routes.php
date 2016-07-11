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
Route::get('/', ['middleware' => 'auth','as'=>'home','uses'=>'HomeController@index']);
Route::get('home', ['middleware' => 'auth','as'=>'home','uses'=>'HomeController@index']);


Route::get('auth/login', ['as'=>'login','uses'=>'Auth\AuthController@getLogin']);
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', ['as'=>'logout','uses'=>'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', ['as'=>'register','uses' =>'Auth\AuthController@postRegister']);


Route::get('home', 'HomeController@index');

Route::get('books',['middleware' => 'auth','uses' => 'BookController@index'] )->name('books');
Route::post('books',['middleware' => 'auth','uses' => 'BookController@index'] )->name('books');
Route::get('books/edit/{id}',['as'=>'books.edit','middleware' => 'auth','uses' => 'BookController@edit'] );

Route::delete ('books/destroy/{id}',['as'=>'books.destroy','middleware' => 'auth','uses' => 'BookController@destroy'] );
//required for unit testing
Route::get ('books/destroy/{id}',['as'=>'books.destroy','middleware' => 'auth','uses' => 'BookController@destroy'] );

Route::get('books/create',['as'=>'books.create','middleware' => 'auth','uses' => 'BookController@create'] );
Route::patch('books/update/{id}',['as'=>'books.update','middleware' => 'auth','uses' => 'BookController@update'] );
