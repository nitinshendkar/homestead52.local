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

Route::get('books',['middleware' => 'auth','uses' => 'BookController@index'] )->name('books');
Route::get('author',['middleware' => 'auth','uses' => 'AuthorController@index'] )->name('author');
Route::get('books/edit/{id}',['as'=>'books.edit','middleware' => 'auth','uses' => 'BookController@edit'] );
Route::get('author/edit/{id}',['as'=>'author.edit','middleware' => 'auth','uses' => 'AuthorController@edit'] );
Route::delete ('books/destroy/{id}',['as'=>'books.destroy','middleware' => 'auth','uses' => 'BookController@destroy'] );
Route::delete ('author/destroy/{id}',['as'=>'author.destroy','middleware' => 'auth','uses' => 'AuthorController@destroy'] );
Route::get('books/create',['as'=>'books.create','middleware' => 'auth','uses' => 'BookController@create'] );
Route::get('authors/create',['as'=>'authors.create','middleware' => 'auth','uses' => 'AuthorController@create'] );
Route::patch('books/update/{id}',['as'=>'books.update','middleware' => 'auth','uses' => 'BookController@update'] );
Route::patch('authors/update/{id}',['as'=>'authors.update','middleware' => 'auth','uses' => 'AuthorController@update'] );
Route::match (['get', 'post'],'books/store',['as'=>'books.store','middleware' => 'auth','uses' => 'BookController@store'] );
Route::match (['get', 'post'],'authors/store',['as'=>'authors.store','middleware' => 'auth','uses' => 'AuthorController@store'] );