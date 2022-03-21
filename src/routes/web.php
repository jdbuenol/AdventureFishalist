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

Route::get('/', 'App\Http\Controllers\ShopController@index')
->name('shop.index');

Route::get('/petshop', 'App\Http\Controllers\ShopController@petShop')
->name('shop.petShop');

Route::get('/foodshop', 'App\Http\Controllers\ShopController@foodShop')
->name('shop.foodShop');

Route::get('/species', 'App\Http\Controllers\SpecieController@index')
->name('specie.index');

Route::get('/species/{id}', 'App\Http\Controllers\SpecieController@show')
->name("specie.show");

Route::get('/register', 'App\Http\Controllers\AuthController@registerScreen')
->name('auth.registerScreen');

Route::get('/login', 'App\Http\Controllers\AuthController@loginScreen')
->name('auth.loginScreen');

