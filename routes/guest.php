<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
|
| Here is where you can register guest routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::namespace('Guest')->group(function () {
    Route::get('/', 'GuestController@index')->name('index');
    Route::get('/blog/{slug}', 'GuestController@showBlog')->name('blog');
});

Auth::routes();
