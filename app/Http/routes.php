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
        'main/article'              => 'MainArticleController',
        'main/info-blocks'          => 'InfoBlocksController',
        'about'                     => 'AboutController',
        'contacts/info'             => 'ContactsInfoController',
        'contacts/messages'         => 'ContactsMessagesController',
        'gallery/categories'        => 'GalleryCategoriesController',
        'gallery/images'            => 'GalleryImagesController',
        'slider'                    => 'SliderController',
        'clients'                   => 'ClientsController',
        'votes'                     => 'VotesController',
        'settings'                  => 'SettingsController',
        'products/list'             => 'ProductsController',
        'products/categories'       => 'ProductCategoriesController',
        'products/providers'        => 'ProductProvidersController',
        'products/manufacturers'    => 'ProductManufacturersController',
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
        'about'         => 'AboutController',
        'contacts'      => 'ContactsController',
        'gallery'       => 'GalleryController',
        'products'      => 'ProductsController',
        'search'        => 'SearchController',
    ]);
});