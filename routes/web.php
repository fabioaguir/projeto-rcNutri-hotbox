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

        Route::group(['prefix' => 'setor'], function () {
            Route::get('/', ['uses' => 'Web\SetorController@index'])->name('setor.index');
            Route::post('/grid', ['uses' => 'Web\SetorController@grid'])->name('setor.grid');
            Route::get('create', ['uses' => 'Web\SetorController@create'])->name('setor.create');
            Route::post('store', ['uses' => 'Web\SetorController@store'])->name('setor.store');
            Route::get('edit/{id}', ['uses' => 'Web\SetorController@edit'])->name('setor.edit');
            Route::post('update/{id}', ['uses' => 'Web\SetorController@update'])->name('setor.update');
            Route::get('delete/{id}', ['uses' => 'Web\SetorController@destroy'])->name('setor.delete');
        });

        Route::group(['prefix' => 'rota'], function () {
            Route::get('/', ['uses' => 'Web\RotaController@index'])->name('rota.index');
            Route::post('/grid', ['uses' => 'Web\RotaController@grid'])->name('rota.grid');
            Route::get('create', ['uses' => 'Web\RotaController@create'])->name('rota.create');
            Route::post('store', ['uses' => 'Web\RotaController@store'])->name('rota.store');
            Route::get('edit/{id}', ['uses' => 'Web\RotaController@edit'])->name('rota.edit');
            Route::post('update/{id}', ['uses' => 'Web\RotaController@update'])->name('rota.update');
            Route::get('delete/{id}', ['uses' => 'Web\RotaController@destroy'])->name('rota.delete');
        });

        Route::group(['prefix' => 'escola'], function () {
            Route::get('/', ['uses' => 'Web\EscolaController@index'])->name('escola.index');
            Route::post('/grid', ['uses' => 'Web\EscolaController@grid'])->name('escola.grid');
            Route::get('create', ['uses' => 'Web\EscolaController@create'])->name('escola.create');
            Route::post('store', ['uses' => 'Web\EscolaController@store'])->name('escola.store');
            Route::get('edit/{id}', ['uses' => 'Web\EscolaController@edit'])->name('escola.edit');
            Route::post('update/{id}', ['uses' => 'Web\EscolaController@update'])->name('escola.update');
            Route::get('delete/{id}', ['uses' => 'Web\EscolaController@destroy'])->name('escola.delete');
        });

        Route::group(['prefix' => 'servico'], function () {
            Route::get('/', ['uses' => 'Web\ServicoController@index'])->name('servico.index');
            Route::post('/grid', ['uses' => 'Web\ServicoController@grid'])->name('servico.grid');
            Route::get('create', ['uses' => 'Web\ServicoController@create'])->name('servico.create');
            Route::post('store', ['uses' => 'Web\ServicoController@store'])->name('servico.store');
            Route::get('edit/{id}', ['uses' => 'Web\ServicoController@edit'])->name('servico.edit');
            Route::post('update/{id}', ['uses' => 'Web\ServicoController@update'])->name('servico.update');
            Route::get('delete/{id}', ['uses' => 'Web\ServicoController@destroy'])->name('servico.delete');
        });

        Route::group(['prefix' => 'embalagem'], function () {
            Route::get('/', ['uses' => 'Web\EmbalagemController@index'])->name('embalagem.index');
            Route::post('/grid', ['uses' => 'Web\EmbalagemController@grid'])->name('embalagem.grid');
            Route::get('create', ['uses' => 'Web\EmbalagemController@create'])->name('embalagem.create');
            Route::post('store', ['uses' => 'Web\EmbalagemController@store'])->name('embalagem.store');
            Route::get('edit/{id}', ['uses' => 'Web\EmbalagemController@edit'])->name('embalagem.edit');
            Route::post('update/{id}', ['uses' => 'Web\EmbalagemController@update'])->name('embalagem.update');
            Route::get('delete/{id}', ['uses' => 'Web\EmbalagemController@destroy'])->name('embalagem.delete');
        });

        Route::group(['prefix' => 'tipoEmbalagem'], function () {
            Route::get('/', ['uses' => 'Web\TipoEmbalagemController@index'])->name('tipoEmbalagem.index');
            Route::post('/grid', ['uses' => 'Web\TipoEmbalagemController@grid'])->name('tipoEmbalagem.grid');
            Route::get('create', ['uses' => 'Web\TipoEmbalagemController@create'])->name('tipoEmbalagem.create');
            Route::post('store', ['uses' => 'Web\TipoEmbalagemController@store'])->name('tipoEmbalagem.store');
            Route::get('edit/{id}', ['uses' => 'Web\TipoEmbalagemController@edit'])->name('tipoEmbalagem.edit');
            Route::post('update/{id}', ['uses' => 'Web\TipoEmbalagemController@update'])->name('tipoEmbalagem.update');
            Route::get('delete/{id}', ['uses' => 'Web\TipoEmbalagemController@destroy'])->name('tipoEmbalagem.delete');
        });
    });
});



