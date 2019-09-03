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
            Route::get('searchBySetor', ['uses' => 'Web\RotaController@searchBySetor'])->name('rota.searchBySetor');
        });

        Route::group(['prefix' => 'escola'], function () {
            Route::get('/', ['uses' => 'Web\EscolaController@index'])->name('escola.index');
            Route::post('/grid', ['uses' => 'Web\EscolaController@grid'])->name('escola.grid');
            Route::get('create', ['uses' => 'Web\EscolaController@create'])->name('escola.create');
            Route::post('store', ['uses' => 'Web\EscolaController@store'])->name('escola.store');
            Route::get('edit/{id}', ['uses' => 'Web\EscolaController@edit'])->name('escola.edit');
            Route::post('update/{id}', ['uses' => 'Web\EscolaController@update'])->name('escola.update');
            Route::get('delete/{id}', ['uses' => 'Web\EscolaController@destroy'])->name('escola.delete');
            Route::get('searchByRota', ['uses' => 'Web\EscolaController@searchByRota'])->name('escola.searchByRota');
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

        Route::group(['prefix' => 'motorista'], function () {
            Route::get('/', ['uses' => 'Web\MotoristaController@index'])->name('motorista.index');
            Route::post('/grid', ['uses' => 'Web\MotoristaController@grid'])->name('motorista.grid');
            Route::get('create', ['uses' => 'Web\MotoristaController@create'])->name('motorista.create');
            Route::post('store', ['uses' => 'Web\MotoristaController@store'])->name('motorista.store');
            Route::get('edit/{id}', ['uses' => 'Web\MotoristaController@edit'])->name('motorista.edit');
            Route::post('update/{id}', ['uses' => 'Web\MotoristaController@update'])->name('motorista.update');
            Route::get('delete/{id}', ['uses' => 'Web\MotoristaController@destroy'])->name('motorista.delete');
        });

        Route::group(['prefix' => 'veiculo'], function () {
            Route::get('/', ['uses' => 'Web\VeiculoController@index'])->name('veiculo.index');
            Route::post('/grid', ['uses' => 'Web\VeiculoController@grid'])->name('veiculo.grid');
            Route::get('create', ['uses' => 'Web\VeiculoController@create'])->name('veiculo.create');
            Route::post('store', ['uses' => 'Web\VeiculoController@store'])->name('veiculo.store');
            Route::get('edit/{id}', ['uses' => 'Web\VeiculoController@edit'])->name('veiculo.edit');
            Route::post('update/{id}', ['uses' => 'Web\VeiculoController@update'])->name('veiculo.update');
            Route::get('delete/{id}', ['uses' => 'Web\VeiculoController@destroy'])->name('veiculo.delete');
        });

        Route::group(['prefix' => 'embalagemEstoque'], function () {
            Route::get('/', ['uses' => 'Web\EmbalagemEstoqueController@index'])->name('embalagemEstoque.index');
            Route::post('/grid', ['uses' => 'Web\EmbalagemEstoqueController@grid'])->name('embalagemEstoque.grid');
            Route::get('create', ['uses' => 'Web\EmbalagemEstoqueController@create'])->name('embalagemEstoque.create');
            Route::post('store', ['uses' => 'Web\EmbalagemEstoqueController@store'])->name('embalagemEstoque.store');
            Route::get('edit/{id}', ['uses' => 'Web\EmbalagemEstoqueController@edit'])->name('embalagemEstoque.edit');
            Route::post('update/{id}', ['uses' => 'Web\EmbalagemEstoqueController@update'])->name('embalagemEstoque.update');
            Route::get('delete/{id}', ['uses' => 'Web\EmbalagemEstoqueController@destroy'])->name('embalagemEstoque.delete');
        });

        Route::group(['prefix' => 'controleSaidaEmbalagem'], function () {
            Route::get('/', ['uses' => 'Web\ControleSaidaEmbalagemController@index'])->name('controleSaidaEmbalagem.index');
            Route::post('/grid', ['uses' => 'Web\ControleSaidaEmbalagemController@grid'])->name('controleSaidaEmbalagem.grid');
            Route::get('create', ['uses' => 'Web\ControleSaidaEmbalagemController@create'])->name('controleSaidaEmbalagem.create');
            Route::post('store', ['uses' => 'Web\ControleSaidaEmbalagemController@store'])->name('controleSaidaEmbalagem.store');
            Route::get('edit/{id}', ['uses' => 'Web\ControleSaidaEmbalagemController@edit'])->name('controleSaidaEmbalagem.edit');
            Route::post('update/{id}', ['uses' => 'Web\ControleSaidaEmbalagemController@update'])->name('controleSaidaEmbalagem.update');
            Route::get('delete/{id}', ['uses' => 'Web\ControleSaidaEmbalagemController@destroy'])->name('controleSaidaEmbalagem.delete');
            Route::get('baixa/{id}', ['uses' => 'Web\ControleSaidaEmbalagemController@baixa'])->name('controleSaidaEmbalagem.baixa');
            Route::post('confirmarBaixa/{id}', ['uses' => 'Web\ControleSaidaEmbalagemController@confirmarBaixa'])->name('controleSaidaEmbalagem.confirmarBaixa');

            Route::post('/controleSaidas', ['uses' => 'Web\ControleSaidaEmbalagemController@grid'])->name('controleSaidaEmbalagem.controleSaidas');
        });

        Route::group(['prefix' => 'gestao'], function () {
            Route::get('/viewControleEmbalagemSaidas', ['uses' => 'Web\ControleSaidaEmbalagemController@viewControleEmbalagemSaidas'])->name('gestao.viewControleEmbalagemSaidas');
            Route::post('/controleEmbalagemSaidas', ['uses' => 'Web\ControleSaidaEmbalagemController@controleEmbalagemSaidas'])->name('gestao.controleEmbalagemSaidas');

            Route::get('/viewControleEmbalagemRetornadas', ['uses' => 'Web\ControleSaidaEmbalagemController@viewControleEmbalagemRetornadas'])->name('gestao.viewControleEmbalagemRetornadas');
            Route::post('/controleEmbalagemRetornadas', ['uses' => 'Web\ControleSaidaEmbalagemController@controleEmbalagemRetornadas'])->name('gestao.controleEmbalagemRetornadas');
        });
    });
});



