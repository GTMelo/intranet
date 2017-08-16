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

// Auth
Auth::routes();
Route::get('/registrar', 'Auth\RegisterController@showRegistrationForm', ['pageTitle' => 'Criar uma Nova Conta']);
Route::get('/entrar', 'Auth\LoginController@showLoginForm', ['pageTitle' => 'Login']);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/teste', 'TesteController@index');