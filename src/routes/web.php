<?php
//AUTHORS: Juanjose Madrigal y Julian Bueno

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

Route::post('/registerUser', 'App\Http\Controllers\AuthController@registerUser')
->name('auth.registerUser');

Route::post('/logout', 'App\Http\Controllers\AuthController@logout')
->name('auth.logout');

Route::post('/login', 'App\Http\Controllers\AuthController@login')
->name('auth.login');

Route::get('/admin/dashboard', 'App\Http\Controllers\AdminController@index')
->name('admin.index');

Route::get('/admin/users', 'App\Http\Controllers\adminCRUD\UsersCRUD@users')
->name('admin.users');

Route::get('/admin/user/new', 'App\Http\Controllers\adminCRUD\UsersCRUD@newUser')
->name('admin.newUser');

Route::get('/admin/user/{user}', 'App\Http\Controllers\adminCRUD\UsersCRUD@user')
->name('admin.user');

Route::post('/admin/user/create', 'App\Http\Controllers\adminCRUD\UsersCRUD@createUser')
->name('admin.createUser');

Route::put('/admin/user/{user}/update', 'App\Http\Controllers\adminCRUD\UsersCRUD@updateUser')
->name('admin.updateUser');

Route::delete('/admin/user/{user}', 'App\Http\Controllers\adminCRUD\UsersCRUD@deleteUser')
->name('admin.deleteUser');