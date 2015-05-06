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

Route::controllers([
    'admin/auth' => 'Admin\Auth\AuthController',
    'admin/password' => 'Admin\Auth\PasswordController',
    'admin/dashboard' => 'Admin\DashboardController',
]);

Route::get('/', 'Marketing\MainController@index');
Route::get('main', 'Marketing\MainController@index');
Route::controller('news', 'Marketing\NewsController');

Route::get('home', 'HomeController@index');


