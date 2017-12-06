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
Route::get('books/edit/{user}', ['as' => 'books.edit', 'uses' => 'BookController@edit']);
Route::delete('books/{user}', ['as' => 'books.destroy', 'uses' => 'BookController@destroy']);
Route::patch('books/{user}', ['as' => 'books.update', 'uses' => 'BookController@update']);
Route::get('search', ['as' => 'search.show', 'uses' => 'SearchUser@index']);
Route::POST('search/find', ['as' => 'search.find', 'uses' => 'SearchUser@getUser']);

Route::get('paywithpaypal', array('as' => 'addmoney.paywithpaypal','uses' => 'AddMoneyController@payWithPaypal',));
Route::post('paypal', array('as' => 'addmoney.paypal','uses' => 'AddMoneyController@postPaymentWithpaypal',));

Route::get('send-main', 'nitinshendkar@gmail.com');
Route::get('paypal', array('as' => 'payment.status','uses' => 'AddMoneyController@getPaymentStatus',));

