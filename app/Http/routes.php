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
Route::get('/', ['as' => 'home', 'uses' => 'MessageBoardController@index']);
Route::get('home', ['as' => 'home', 'uses' => 'MessageBoardController@index']);
Route::get('messageboard/create', ['as' => 'home', 'uses' => 'MessageBoardController@create']);
Route::post('messageboard', ['as' => 'messageboard.store', 'uses' => 'MessageBoardController@store']);

//users
Route::get('users', ['as' => 'users.index', 'uses' => 'UserController@index']);
Route::post('users', ['as' => 'users.store', 'uses' => 'UserController@store']);
Route::post('users/reset/{user}', ['as' => 'users.reset', 'uses' => 'UserController@reset']);
Route::get('users/create', ['as' => 'users.create', 'uses' => 'UserController@create']);
Route::get('users/edit/{user}', ['as' => 'users.edit', 'uses' => 'UserController@edit']);
Route::delete('users/{user}', ['as' => 'users.destroy', 'uses' => 'UserController@destroy']);
Route::patch('users/{user}', ['as' => 'users.update', 'uses' => 'UserController@update']);

Route::get('educations', ['as' => 'educations.index', 'uses' => 'EducationalController@index']);
Route::post('educations', ['as' => 'educations.store', 'uses' => 'EducationalController@store']);
Route::get('educations/create', ['as' => 'educations.create', 'uses' => 'EducationalController@create']);
Route::get('educations/edit/{education}', ['as' => 'educations.edit', 'uses' => 'EducationalController@edit']);
Route::delete('educations/{education}', ['as' => 'educations.destroy', 'uses' => 'EducationalController@destroy']);
Route::patch('educations/{education}', ['as' => 'educations.update', 'uses' => 'EducationalController@update']);

Route::get('address', ['as' => 'address.index', 'uses' => 'AddressController@index']);
Route::post('address', ['as' => 'address.store', 'uses' => 'AddressController@store']);
Route::get('address/create', ['as' => 'address.create', 'uses' => 'AddressController@create']);
Route::get('address/edit/{address}', ['as' => 'address.edit', 'uses' => 'AddressController@edit']);
Route::delete('address/{address}', ['as' => 'address.destroy', 'uses' => 'AddressController@destroy']);
Route::patch('address/{address}', ['as' => 'address.update', 'uses' => 'AddressController@update']);

Route::get('personal', ['as' => 'personal.index', 'uses' => 'PersonalController@index']);
Route::post('personal', ['as' => 'personal.store', 'uses' => 'PersonalController@store']);
Route::get('personal/create', ['as' => 'personal.create', 'uses' => 'PersonalController@create']);
Route::get('personal/edit/{personal}', ['as' => 'personal.edit', 'uses' => 'PersonalController@edit']);
Route::delete('personal/{personal}', ['as' => 'personal.destroy', 'uses' => 'PersonalController@destroy']);
Route::patch('personal/{personal}', ['as' => 'personal.update', 'uses' => 'PersonalController@update']);

Route::get('proffessional', ['as' => 'proffessional.index', 'uses' => 'ProffessionalController@index']);
Route::post('proffessional', ['as' => 'proffessional.store', 'uses' => 'ProffessionalController@store']);
Route::get('proffessional/create', ['as' => 'proffessional.create', 'uses' => 'ProffessionalController@create']);
Route::get('proffessional/edit/{proffessional}', ['as' => 'proffessional.edit', 'uses' => 'ProffessionalController@edit']);
Route::delete('proffessional/{proffessional}', ['as' => 'proffessional.destroy', 'uses' => 'ProffessionalController@destroy']);
Route::patch('proffessional/{proffessional}', ['as' => 'proffessional.update', 'uses' => 'ProffessionalController@update']);

Route::get('banks', ['as' => 'banks.index', 'uses' => 'BankController@index']);
Route::post('banks', ['as' => 'banks.store', 'uses' => 'BankController@store']);
Route::get('banks/create', ['as' => 'banks.create', 'uses' => 'BankController@create']);
Route::get('banks/edit/{bank}', ['as' => 'banks.edit', 'uses' => 'BankController@edit']);
Route::delete('banks/{bank}', ['as' => 'banks.destroy', 'uses' => 'BankController@destroy']);
Route::patch('banks/{bank}', ['as' => 'banks.update', 'uses' => 'BankController@update']);

Route::get('search', ['as' => 'search.show', 'uses' => 'SearchUser@index']);
Route::POST('search/find', ['as' => 'search.find', 'uses' => 'SearchUser@getUser']);

Route::get('paywithpaypal', array('as' => 'addmoney.paywithpaypal','uses' => 'AddMoneyController@payWithPaypal',));
Route::post('paypal', array('as' => 'addmoney.paypal','uses' => 'AddMoneyController@postPaymentWithpaypal',));

Route::get('nopermission', array('as' => 'Permission.nopermission','uses' => 'PermissionController@nopermission'));
Route::get('notapproved', array('as' => 'Permission.notapproved','uses' => 'PermissionController@notapproved'));
Route::get('createrecord', array('as' => 'Permission.createrecord','uses' => 'PermissionController@createrecord'));
Route::get('send-mail', 'nitinshendkar@gmail.com');
Route::get('paypal', array('as' => 'payment.status','uses' => 'AddMoneyController@getPaymentStatus',));

