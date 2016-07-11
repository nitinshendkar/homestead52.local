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
*/
Route::get('/', ['middleware' => 'auth','as'=>'home','uses'=>'HomeController@index']);
Route::get('home', ['middleware' => 'auth','as'=>'home','uses'=>'HomeController@index']);

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);
Route::get('auth/login', ['as'=>'login','uses'=>'Auth\AuthController@getLogin']);
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', ['as'=>'logout','uses'=>'Auth\AuthController@getLogout']);
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', ['as'=>'register','uses' =>'Auth\AuthController@postRegister']);

Route::match (['get', 'post'],'authors/store',['as'=>'authors.store','middleware' => 'auth','uses' => 'AuthorController@store'] );
Route::get('authors',['middleware' => 'auth','uses' => 'AuthorController@index'] )->name('author');
Route::get('authors/edit/{id}',['as'=>'author.edit','middleware' => 'auth','uses' => 'AuthorController@edit'] );
Route::delete ('authors/destroy/{id}',['as'=>'author.destroy','middleware' => 'auth','uses' => 'AuthorController@destroy'] );
Route::get('authors/create',['as'=>'authors.create','middleware' => 'auth','uses' => 'AuthorController@create'] );
Route::patch('authors/update/{id}',['as'=>'authors.update','middleware' => 'auth','uses' => 'AuthorController@update'] );

Route::match (['get', 'post'],'books',['middleware' => 'auth','uses' => 'BookController@index'])->name('books');
Route::post('books',['middleware' => 'auth','uses' => 'BookController@index'] )->name('books');
Route::match (['get', 'post'],'books/store',['as'=>'books.store','middleware' => 'auth','uses' => 'BookController@store'] );
Route::get('books/edit/{id}',['as'=>'books.edit','middleware' => 'auth','uses' => 'BookController@edit'] );
Route::delete ('books/destroy/{id}',['as'=>'books.destroy','middleware' => 'auth','uses' => 'BookController@destroy'] );
Route::get('books/create',['as'=>'books.create','middleware' => 'auth','uses' => 'BookController@create'] );
Route::patch('books/update/{id}',['as'=>'books.update','middleware' => 'auth','uses' => 'BookController@update'] );
//required for unit testing
Route::get ('books/destroy/{id}',['as'=>'books.destroy','middleware' => 'auth','uses' => 'BookController@destroy'] );

