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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [
    'as' => 'HomePage',
    'uses' => 'HomeController@index'
]);

/*
Route::post('/siteuser/login', [
    'as' => 'LoginPage',
    'uses' => 'HomeController@login'
]);
*/


Route::any('/user/reset/password', 'HomeController@resetPassword');

Route::get('/view/relation/blogpost', [
    'as' => 'view.relationship',
    'uses' => 'HomeController@viewRelationship'
]);

Route::match(['get', 'post'], '/siteuser/login', [
    'as' => 'LoginPage',
    'uses' => 'HomeController@login'
]);

Route::match(['get', 'post'], '/users/list', [
    'as' => 'userlist',
    'uses' => 'HomeController@userList'
]);
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
