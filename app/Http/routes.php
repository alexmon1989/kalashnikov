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
        'dashboard'                 => 'DashboardController',
        'news'                      => 'NewsController',
        'promotions'                => 'PromotionsController',
        'main/article'              => 'MainArticleController',
        'main/info-blocks'          => 'InfoBlocksController',
        'about'                     => 'AboutController',
        'contacts/info'             => 'ContactsInfoController',
        'contacts/messages'         => 'ContactsMessagesController',
        'slider'                    => 'SliderController',
        'partners'                  => 'PartnersController',
        'votes'                     => 'VotesController',
        'settings'                  => 'SettingsController',
        'products/list'             => 'ProductsController',
        'products/categories'       => 'ProductCategoriesController',
        'products/providers'        => 'ProductProvidersController',
        'products/manufacturers'    => 'ProductManufacturersController',
        'vacancies'                 => 'VacanciesController',
    ]);
});

Route::get('/', 'Marketing\MainController@index');
Route::get('main', 'Marketing\MainController@index');
Route::post('main/vote', 'Marketing\MainController@vote');
Route::post('main/price-request', 'Marketing\MainController@priceRequest');
// Группа роутов польз. части
Route::group(['namespace' => 'Marketing'], function()
{
    Route::controllers([
        'news'          => 'NewsController',
        'promotions'    => 'PromotionsController',
        'about'         => 'AboutController',
        'contacts'      => 'ContactsController',
        'products'      => 'ProductsController',
        'search'        => 'SearchController',
        'vacancies'     => 'VacanciesController',
    ]);
});