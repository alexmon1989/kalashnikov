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

Route::get('admin', ['middleware' => 'auth', 'Admin\DashboardController@getIndex']);

// Роут контроллера авторизации, middleware указан в его конструкторе
Route::controller('admin/auth', 'Admin\Auth\AuthController');

// Группа роутов админки
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'], function()
{
    Route::controllers([
        'dashboard' => 'DashboardController',
        'news' => 'NewsController',
        'main/article' => 'MainArticleController',
        'main/info-blocks' => 'InfoBlocksController',
        'about' => 'AboutController',
        'contacts/info' => 'ContactsInfoController',
        'contacts/messages' => 'ContactsMessagesController',
    ]);
});

// Группа роутов польз. части
Route::get('/', 'Marketing\MainController@index');
Route::get('main', 'Marketing\MainController@index');
Route::controller('news', 'Marketing\NewsController');
Route::controller('about', 'Marketing\AboutController');
Route::controller('contacts', 'Marketing\ContactsController');

Route::get('home', 'HomeController@index');