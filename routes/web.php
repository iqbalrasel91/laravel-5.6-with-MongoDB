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

Route::get('/', 'User\LoginController@index');
Route::post('login', [ 'as' => 'login', 'uses' => 'User\LoginController@Auth']);


Route::group(['middleware' => ['preventbackbutton','auth']], function(){

    Route::get('dashboard', 'User\HomeController@index');
    Route::get('logout', 'User\LoginController@logout');

    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'User\UserController@index')->name('user.index');
        Route::post('/store', 'User\UserController@store')->name('user.store');
        Route::get('/create', 'User\UserController@create')->name('user.create');
        Route::get('/edit/{id}', 'User\UserController@edit')->name('user.edit');
        Route::put('/update/{id}', 'User\UserController@update')->name('user.update');
        Route::delete('/destroy/{id}', 'User\UserController@destroy')->name('user.destroy');

    });



    Route::group(['prefix' => 'changePassword'], function () {
        Route::get('/', 'User\ChangePasswordController@index')->name('changePassword.index');
        Route::put('/update/{id}', 'User\ChangePasswordController@update')->name('changePassword.update');
    });

    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'CategoryController@index')->name('category.index');
        Route::post('/store', 'CategoryController@store')->name('category.store');
        Route::get('/create', 'CategoryController@create')->name('category.create');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('category.edit');
        Route::put('/update/{id}', 'CategoryController@update')->name('category.update');
        Route::delete('/destroy/{id}', 'CategoryController@destroy')->name('category.destroy');
    });








});

