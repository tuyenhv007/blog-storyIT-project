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

Route::get('/', function () {
    return view('admin.layouts.master');
});

Route::get('/register', 'LoginController@registerIndex')->name('register.index');
Route::post('/register', 'LoginController@register')->name('register.create');
Route::get('/login', 'LoginController@loginIndex')->name('login.index');
Route::post('/login', 'LoginController@login')->name('login.create');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::middleware(['user'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/index', 'DashboardController@index')->name('dashboard.index');
        Route::get('/category-list', 'CategoryController@index')->name('category.index');
        Route::get('/category-create', 'CategoryController@create')->name('category.create');
        Route::post('/category-create', 'CategoryController@store')->name('category.store');
        Route::get('/category-edit/{id}', 'CategoryController@edit')->name('category.edit');
        Route::post('/category-edit/{id}', 'CategoryController@update')->name('category.update');
        Route::get('/category-delete/{id}', 'CategoryController@delete')->name('category.delete');
    });
});


