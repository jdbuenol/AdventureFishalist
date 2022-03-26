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

Route::get('/petshop/{id}', 'App\Http\Controllers\ShopController@petshow')
->name('shop.petshopshow');

Route::get('/foodshop', 'App\Http\Controllers\ShopController@foodShop')
->name('shop.foodShop');

Route::get('/foodshop/{id}', 'App\Http\Controllers\ShopController@foodshow')
->name('shop.foodshopshow');

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

// USERS CRUD
Route::get('/admin/users', 'App\Http\Controllers\adminCRUD\UsersCRUD@users')
->name('admin.users');

Route::get('/admin/user/new', 'App\Http\Controllers\adminCRUD\UsersCRUD@newUser')
->name('admin.newUser');

Route::get('/admin/user/{user}', 'App\Http\Controllers\adminCRUD\UsersCRUD@user')
->name('admin.user');

Route::post('/admin/user/create', 'App\Http\Controllers\adminCRUD\UsersCRUD@createUser')
->name('admin.createUser');

Route::put('/admin/user/{user}', 'App\Http\Controllers\adminCRUD\UsersCRUD@updateUser')
->name('admin.updateUser');

Route::delete('/admin/user/{user}', 'App\Http\Controllers\adminCRUD\UsersCRUD@deleteUser')
->name('admin.deleteUser');

// ORDERS CRUD
Route::get('/admin/orders', 'App\Http\Controllers\adminCRUD\OrdersCRUD@orders')
->name('admin.orders');

Route::get('/admin/order/new', 'App\Http\Controllers\adminCRUD\OrdersCRUD@newOrder')
->name('admin.newOrder');

Route::get('/admin/order/{order}', 'App\Http\Controllers\adminCRUD\OrdersCRUD@order')
->name('admin.order');

Route::post('/admin/order/create', 'App\Http\Controllers\adminCRUD\OrdersCRUD@createOrder')
->name('admin.createOrder');

Route::put('/admin/order/{order}', 'App\Http\Controllers\adminCRUD\OrdersCRUD@updateOrder')
->name('admin.updateOrder');

Route::delete('/admin/order/{order}', 'App\Http\Controllers\adminCRUD\OrdersCRUD@deleteOrder')
->name('admin.deleteOrder');

// SPECIES CRUD
Route::get('/admin/species', 'App\Http\Controllers\adminCRUD\SpeciesCRUD@species')
->name('admin.species');

Route::get('/admin/specie/new', 'App\Http\Controllers\adminCRUD\SpeciesCRUD@newSpecie')
->name('admin.newSpecie');

Route::get('/admin/specie/{specie}', 'App\Http\Controllers\adminCRUD\SpeciesCRUD@specie')
->name('admin.specie');

Route::post('/admin/specie/create', 'App\Http\Controllers\adminCRUD\SpeciesCRUD@createSpecie')
->name('admin.createSpecie');

Route::put('/admin/specie/{specie}', 'App\Http\Controllers\adminCRUD\SpeciesCRUD@updateSpecie')
->name('admin.updateSpecie');

Route::delete('/admin/specie/{specie}', 'App\Http\Controllers\adminCRUD\SpeciesCRUD@deleteSpecie')
->name('admin.deleteSpecie');

// LOCATIONS CRUD
Route::get('/admin/locations', 'App\Http\Controllers\adminCRUD\LocationsCRUD@locations')
->name('admin.locations');

Route::get('/admin/location/new', 'App\Http\Controllers\adminCRUD\LocationsCRUD@newLocation')
->name('admin.newLocation');

Route::get('/admin/location/{location}', 'App\Http\Controllers\adminCRUD\LocationsCRUD@location')
->name('admin.location');

Route::post('/admin/location/create', 'App\Http\Controllers\adminCRUD\LocationsCRUD@createLocation')
->name('admin.createLocation');

Route::put('/admin/location/{location}', 'App\Http\Controllers\adminCRUD\LocationsCRUD@updateLocation')
->name('admin.updateLocation');

Route::delete('/admin/location/{location}', 'App\Http\Controllers\adminCRUD\LocationsCRUD@deleteLocation')
->name('admin.deleteLocation');

// SPECIES LOCATIONS CRUD
Route::get('/admin/speciesLocations', 'App\Http\Controllers\adminCRUD\SpeciesLocationsCRUD@speciesLocations')
->name('admin.speciesLocations');

Route::get('/admin/specieLocation/new', 'App\Http\Controllers\adminCRUD\SpeciesLocationsCRUD@newSpecieLocation')
->name('admin.newSpecieLocation');

Route::get('/admin/specieLocation/{specieLocation}', 'App\Http\Controllers\adminCRUD\SpeciesLocationsCRUD@specieLocation')
->name('admin.specieLocation');

Route::post('/admin/specieLocation/create', 'App\Http\Controllers\adminCRUD\SpeciesLocationsCRUD@createSpecieLocation')
->name('admin.createSpecieLocation');

Route::put('/admin/specieLocation/{specieLocation}', 'App\Http\Controllers\adminCRUD\SpeciesLocationsCRUD@updateSpecieLocation')
->name('admin.updateSpecieLocation');

Route::delete('/admin/specieLocation/{specieLocation}', 'App\Http\Controllers\adminCRUD\SpeciesLocationsCRUD@deleteSpecieLocation')
->name('admin.deleteSpecieLocation');

// PET FISHES CRUD
Route::get('/admin/petFishes', 'App\Http\Controllers\adminCRUD\PetFishesCRUD@petFishes')
->name('admin.petFishes');

Route::get('/admin/petFish/new', 'App\Http\Controllers\adminCRUD\PetFishesCRUD@newPetFish')
->name('admin.newPetFish');

Route::get('/admin/petFish/{petFish}', 'App\Http\Controllers\adminCRUD\PetFishesCRUD@petFish')
->name('admin.petFish');

Route::post('/admin/petFish/create', 'App\Http\Controllers\adminCRUD\PetFishesCRUD@createPetFish')
->name('admin.createPetFish');

Route::put('/admin/petFish/{petFish}', 'App\Http\Controllers\adminCRUD\PetFishesCRUD@updatePetFish')
->name('admin.updatePetFish');

Route::delete('/admin/petFish/{petFish}', 'App\Http\Controllers\adminCRUD\PetFishesCRUD@deletePetFish')
->name('admin.deletePetFish');

// PET FISHES CRUD
Route::get('/adminfoodFishes', 'App\Http\Controllers\adminCRUD\FoodFishesCRUD@foodFishes')
->name('admin.foodFishes');

Route::get('/admin/foodFish/new', 'App\Http\Controllers\adminCRUD\FoodFishesCRUD@newFoodFish')
->name('admin.newFoodFish');

Route::get('/admin/foodFish/{foodFish}', 'App\Http\Controllers\adminCRUD\FoodFishesCRUD@foodFish')
->name('admin.foodFish');

Route::post('/admin/foodFish/create', 'App\Http\Controllers\adminCRUD\FoodFishesCRUD@createFoodFish')
->name('admin.createFoodFish');

Route::put('/admin/foodFish/{foodFish}', 'App\Http\Controllers\adminCRUD\FoodFishesCRUD@updateFoodFish')
->name('admin.updateFoodFish');

Route::delete('/admin/foodFish/{foodFish}', 'App\Http\Controllers\adminCRUD\FoodFishesCRUD@deleteFoodFish')
->name('admin.deleteFoodFish');