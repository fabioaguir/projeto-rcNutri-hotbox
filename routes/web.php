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

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    Route::get('/', function () {
        return redirect()->route('login');
    });

    Auth::routes();

    Route::group(['prefix' => 'was', 'middleware' => 'auth'], function () {

        Route::get('/home', 'HomeController@index')->name('home');

        Route::group(['prefix' => 'user'], function () {
            Route::get('/', ['uses' => 'Web\UserController@index'])->name('user.index');
            Route::post('/grid', ['uses' => 'Web\UserController@grid'])->name('user.grid');
            Route::get('create', ['uses' => 'Web\UserController@create'])->name('user.create');
            Route::post('store', ['uses' => 'Web\UserController@store'])->name('user.store');
            Route::get('edit/{id}', ['uses' => 'Web\UserController@edit'])->name('user.edit');
            Route::post('update/{id}', ['uses' => 'Web\UserController@update'])->name('user.update');
        });
    });
});



