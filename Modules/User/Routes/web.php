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

Route::prefix('user')->as('user.')->group(function() {
    Route::get('/', 'UserController@index')->name('index');
    Route::get('/login', 'UserController@login')->name('login');
    Route::get('/logout', 'UserController@logout')->name('logout');
    Route::get('/register', 'UserController@register')->name('register');

    Route::resource('card','CardController',['except'=>['show','edit']]);
    Route::resource('site','SiteController',['except'=>['show','edit']]);
});
