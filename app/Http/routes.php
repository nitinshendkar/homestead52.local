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
//Auth
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);
Route::get('login', 'Auth\AuthController@getLogin');
Route::get('resetpassword', 'ResetPassword@showResetPassword');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', ['as' => 'register', 'uses' => 'Auth\AuthController@create']);

//home
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index']);

//books
Route::get('books', ['as' => 'books.index', 'uses' => 'BookController@index']);
Route::post('books', ['as' => 'books.store', 'uses' => 'BookController@store']);
Route::get('books/create', ['as' => 'books.create', 'uses' => 'BookController@create']);
Route::get('books/{book}/edit', ['as' => 'books.edit', 'uses' => 'BookController@edit']);
Route::get('books/{book}', ['as' => 'books.show', 'uses' => 'BookController@show']);
Route::delete('books/{book}', ['as' => 'books.destroy', 'uses' => 'BookController@destroy']);
Route::patch('books/{book}', ['as' => 'books.update', 'uses' => 'BookController@update']);

//Authors
Route::get('authors', ['as' => 'authors.index', 'uses' => 'AuthorController@index']);
Route::post('authors', ['as' => 'authors.store', 'uses' => 'AuthorController@store']);
Route::get('authors/create', ['as' => 'authors.create', 'uses' => 'AuthorController@create']);
Route::get('authors/{author}/edit', ['as' => 'authors.edit', 'uses' => 'AuthorController@edit']);
Route::get('authors/{author}', ['as' => 'authors.show', 'uses' => 'AuthorController@show']);
Route::delete('authors/{author}', ['as' => 'authors.destroy', 'uses' => 'AuthorController@destroy']);
Route::patch('authors/{author}', ['as' => 'authors.update', 'uses' => 'AuthorController@update']);

Route::get('paywithpaypal', array('as' => 'addmoney.paywithpaypal','uses' => 'AddMoneyController@payWithPaypal',));
Route::post('paypal', array('as' => 'addmoney.paypal','uses' => 'AddMoneyController@postPaymentWithpaypal',));
Route::get('paypal', array('as' => 'payment.status','uses' => 'AddMoneyController@getPaymentStatus',));

