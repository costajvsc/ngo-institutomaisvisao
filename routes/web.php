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

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'SolicitacaoController@index')->name('dashboard');
    Route::get('/solicitacao/{id}', 'SolicitacaoController@find');

    Route::get('/solicitacao', 'SolicitacaoController@create');
    Route::post('/solicitacao', 'SolicitacaoController@store');

    Route::get('/solicitacao/edit/{id}', 'SolicitacaoController@edit');
    Route::put('/solicitacao/update', 'SolicitacaoController@update');

    Route::get('/solicitacao/delete/{id}', 'SolicitacaoController@delete');
    Route::delete('/solicitacao/delete', 'SolicitacaoController@destroy');

    Route::get('/solicitacao/document/delete/{id_doc}', 'DocumentController@delete');
    Route::delete('/solicitacao/document/delete', 'DocumentController@destroy');
});

Route::get('/', function () { return view('welcome');});

Route::get('/login', 'UserController@login')->name('login');
Route::get('/logout', 'UserController@logout');
Route::post('/login', 'UserController@authenticate');
