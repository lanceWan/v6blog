<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::namespace('Web')->group(function($router){

    $router->get('/', 'HomeController@index');
    $router->get('post/{id}', 'HomeController@detail');
    $router->get('about', 'HomeController@aboutMe');
    $router->get('message', 'HomeController@message');
    $router->get('tag', 'HomeController@tag');
    $router->get('tag/{id}', 'HomeController@postTag');
    $router->get('category/{id}', 'HomeController@postCategory');

});

Route::namespace('Admin')->prefix('admin')->middleware('auth')->group(function($router){

    $router->get('/', 'DashboardController@index')->name('admin.dashboard');
    $router->match(['get', 'post'], 'about', 'SettingController@about')->name('admin.about');
    $router->match(['get', 'post'], 'system', 'SettingController@system')->name('admin.system');
    $router->resources([
        'post' => 'PostController',
        'tag' => 'TagController',
        'category' => 'CategoryController',
        'link' => 'LinkController',
    ]);

});

Auth::routes(['register' => false]);
