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

//users
Route::get('users', ['as' => 'users.index', 'uses' => 'UserController@index']);
Route::post('users', ['as' => 'users.store', 'uses' => 'UserController@store']);
Route::get('users/create', ['as' => 'users.create', 'uses' => 'UserController@create']);
Route::get('users/edit/{user}', ['as' => 'users.edit', 'uses' => 'UserController@edit']);
Route::delete('users/{user}', ['as' => 'users.destroy', 'uses' => 'UserController@destroy']);
Route::patch('users/{user}', ['as' => 'users.update', 'uses' => 'UserController@update']);

Route::get('educations', ['as' => 'educations.index', 'uses' => 'EducationalController@index']);
Route::post('educations', ['as' => 'educations.store', 'uses' => 'EducationalController@store']);
Route::get('educations/create', ['as' => 'educations.create', 'uses' => 'EducationalController@create']);
Route::get('educations/edit/{user}', ['as' => 'educations.edit', 'uses' => 'EducationalController@edit']);
Route::delete('educations/{user}', ['as' => 'educations.destroy', 'uses' => 'EducationalController@destroy']);
Route::patch('educations/{user}', ['as' => 'educations.update', 'uses' => 'EducationalController@update']);

Route::get('personal', ['as' => 'personal.index', 'uses' => 'PersonalController@index']);
Route::post('personal', ['as' => 'personal.store', 'uses' => 'PersonalController@store']);
Route::get('personal/create', ['as' => 'personal.create', 'uses' => 'PersonalController@create']);
Route::get('personal/edit/{user}', ['as' => 'personal.edit', 'uses' => 'PersonalController@edit']);
Route::delete('personal/{user}', ['as' => 'personal.destroy', 'uses' => 'PersonalController@destroy']);
Route::patch('personal/{user}', ['as' => 'personal.update', 'uses' => 'PersonalController@update']);

Route::get('proffessional', ['as' => 'proffessional.index', 'uses' => 'ProffessionalController@index']);
Route::post('proffessional', ['as' => 'proffessional.store', 'uses' => 'ProffessionalController@store']);
Route::get('proffessional/create', ['as' => 'proffessional.create', 'uses' => 'ProffessionalController@create']);
Route::get('proffessional/edit/{user}', ['as' => 'proffessional.edit', 'uses' => 'ProffessionalController@edit']);
Route::delete('proffessional/{user}', ['as' => 'proffessional.destroy', 'uses' => 'ProffessionalController@destroy']);
Route::patch('proffessional/{user}', ['as' => 'proffessional.update', 'uses' => 'ProffessionalController@update']);

Route::get('banks', ['as' => 'banks.index', 'uses' => 'BankController@index']);
Route::post('banks', ['as' => 'banks.store', 'uses' => 'BankController@store']);
Route::get('banks/create', ['as' => 'banks.create', 'uses' => 'BankController@create']);
Route::get('banks/edit/{user}', ['as' => 'banks.edit', 'uses' => 'BankController@edit']);
Route::delete('banks/{user}', ['as' => 'banks.destroy', 'uses' => 'BankController@destroy']);
Route::patch('banks/{user}', ['as' => 'banks.update', 'uses' => 'BankController@update']);

Route::get('search', ['as' => 'search.show', 'uses' => 'SearchUser@index']);
Route::POST('search/find', ['as' => 'search.find', 'uses' => 'SearchUser@getUser']);

Route::get('paywithpaypal', array('as' => 'addmoney.paywithpaypal','uses' => 'AddMoneyController@payWithPaypal',));
Route::post('paypal', array('as' => 'addmoney.paypal','uses' => 'AddMoneyController@postPaymentWithpaypal',));

Route::get('send-main', 'nitinshendkar@gmail.com');
Route::get('paypal', array('as' => 'payment.status','uses' => 'AddMoneyController@getPaymentStatus',));

