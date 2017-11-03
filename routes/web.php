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

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home.index', ['pageTitle' => 'Home']);
});

Route::prefix('admin')->group(function (){
    Route::get('/', 'AdminController@index');
    Route::get('flaglist', 'AdminController@flagList');
//    Route::get('cache', 'AdminController@cacheList');

});

// Auth
Auth::routes();
Route::get('/registrar', 'Auth\RegisterController@showRegistrationForm', ['pageTitle' => 'Criar uma Nova Conta']);
Route::get('/entrar', 'Auth\LoginController@showLoginForm', ['pageTitle' => 'Login']);
Route::get('/sair', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/teste')->group(function (){
    Route::get('/', 'TesteController@index');
    Route::post('/', 'TesteController@docStore');
});

// Usuários
Route::prefix('usuarios')->group(function (){
    Route::get('/', 'UserController@index');
    Route::get('/{user}', 'UserController@show');
    Route::get('/{user}/rh/{secao}', 'UserController@show');
    Route::get('/{user}/editar', 'UserController@edit');
    Route::patch('/{user}', 'UserController@patch');
});