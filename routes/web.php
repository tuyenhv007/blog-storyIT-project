<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/detail/{id}', 'PostController@detailPostUI')->name('post.detailPostUI');

Route::get('/register', 'LoginController@registerIndex')->name('register.index');
Route::post('/register', 'LoginController@register')->name('register.create');
Route::get('/login', 'LoginController@loginIndex')->name('login.index');
Route::post('/login', 'LoginController@login')->name('login.create');
Route::get('/logout', 'LoginController@logout')->name('logout');


Route::middleware(['user'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/index', 'DashboardController@index')->name('dashboard.index');
        Route::prefix('/category')->group(function () {
            Route::get('/list', 'CategoryController@index')->name('category.index');
            Route::get('/create', 'CategoryController@create')->name('category.create');
            Route::post('/create', 'CategoryController@store')->name('category.store');
            Route::get('/edit/{id}', 'CategoryController@edit')->name('category.edit');
            Route::post('/edit/{id}', 'CategoryController@update')->name('category.update');
            Route::get('/delete/{id}', 'CategoryController@delete')->name('category.delete');
        });
        Route::prefix('/post')->group(function () {
            Route::get('/list', 'PostController@index')->name('post.index');
            Route::get('/detail/{id}', 'PostController@detailPostAdmin')->name('post.detailPostAdmin');
            Route::get('/create', 'PostController@create')->name('post.create');
            Route::post('/create', 'PostController@store')->name('post.store');
            Route::get('/edit/{id}', 'PostController@edit')->name('post.edit');
            Route::post('/edit/{id}', 'PostController@update')->name('post.update');
            Route::get('/delete/{id}', 'PostController@delete')->name('post.delete');
        });
    });
});


