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

Route::group(['middleware' => 'localization'], function(){
Route::get('/', 'App\Http\Controllers\ShopController@index')
->name('shop.index');

Route::get('/change-language/{lang}',"App\Http\Controllers\ShopController@changeLang")
->name('shop.changeLang');

Route::get('/petshop', 'App\Http\Controllers\ShopController@petShop')
->name('shop.petShop');

Route::get('/petshop/random', 'App\Http\Controllers\ShopController@getRandomPet')
->name('shop.petRandom');

Route::get('/petshop/{id}', 'App\Http\Controllers\ShopController@petshow')
->name('shop.petshopshow');

Route::get('/foodshop', 'App\Http\Controllers\ShopController@foodShop')
->name('shop.foodShop');

Route::get('/foodshop/random', 'App\Http\Controllers\ShopController@getRandomFood')
->name('shop.foodRandom');

Route::get('/foodshop/{id}', 'App\Http\Controllers\ShopController@foodshow')
->name('shop.foodshopshow');


Route::get('/species', 'App\Http\Controllers\SpecieController@index')
->name('specie.index');

Route::get('/species/{id}', 'App\Http\Controllers\SpecieController@show')
->name("specie.show");

Route::get('/profile', 'App\Http\Controllers\ProfileController@profile')
    ->name("profile.profile")
    ->middleware(['auth']);

Route::get('/profile/history', 'App\Http\Controllers\ProfileController@generateHistory')
    ->name("profile.history")
    ->middleware(['auth']);

Route::get('/cart', 'App\Http\Controllers\OrderController@cart')
    ->name("order.cart")
    ->middleware(['auth']);

Route::post('/cart/addPet/{petFishes}', 'App\Http\Controllers\OrderController@addPet')
    ->name("order.addPet")
    ->middleware(['auth']);

Route::post('/cart/addFood/{foodFishes}', 'App\Http\Controllers\OrderController@addFood')
    ->name("order.addFood")
    ->middleware(['auth']);

Route::delete('/cart/deleteItem', 'App\Http\Controllers\OrderController@deleteItem')
    ->name("order.deleteItem")
    ->middleware(['auth']);

Route::post('/cart/checkout', 'App\Http\Controllers\OrderController@checkout')
    ->name("order.checkout")
    ->middleware(['auth']);

Route::post('/logout', 'App\Http\Controllers\AuthController@logout')
    ->name('auth.logout')
    ->middleware(['auth']);

Route::get('/register', 'App\Http\Controllers\AuthController@registerScreen')
    ->name('auth.registerScreen')
    ->middleware(['guest']);

Route::get('/login', 'App\Http\Controllers\AuthController@loginScreen')
    ->name('auth.loginScreen')
    ->middleware(['guest']);

Route::post('/registerUser', 'App\Http\Controllers\AuthController@registerUser')
    ->name('auth.registerUser')
    ->middleware(['guest']);

Route::post('/login', 'App\Http\Controllers\AuthController@login')
    ->name('auth.login')
    ->middleware(['guest']);

//ADMIN PANEL

Route::get('/admin/dashboard', 'App\Http\Controllers\AdminController@index')
    ->name('admin.index')
    ->middleware(['auth', 'admin']);

Route::get('/admin', 'App\Http\Controllers\AdminController@index')
    ->name('admin.index')
    ->middleware(['auth', 'admin']);

//CRUDS
Route::group(
    ['namespace' => 'App\Http\Controllers\adminCRUD', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {

        //USERS CRUD
        Route::get('users', 'UsersCRUD@users')
        ->name('admin.users');

        Route::get('user/new', 'UsersCRUD@newUser')
        ->name('admin.newUser');

        Route::get('user/{user}', 'UsersCRUD@user')
        ->name('admin.user');

        Route::post('user/create', 'UsersCRUD@createUser')
        ->name('admin.createUser');

        Route::put('user/{user}', 'UsersCRUD@updateUser')
        ->name('admin.updateUser');

        Route::delete('user/{user}', 'UsersCRUD@deleteUser')
        ->name('admin.deleteUser');

        // ORDERS CRUD
        Route::get('orders', 'OrdersCRUD@orders')
        ->name('admin.orders');

        Route::get('order/new', 'OrdersCRUD@newOrder')
        ->name('admin.newOrder');

        Route::get('order/{order}', 'OrdersCRUD@order')
        ->name('admin.order');

        Route::post('order/create', 'OrdersCRUD@createOrder')
        ->name('admin.createOrder');

        Route::put('order/{order}', 'OrdersCRUD@updateOrder')
        ->name('admin.updateOrder');

        Route::delete('order/{order}', 'OrdersCRUD@deleteOrder')
        ->name('admin.deleteOrder');

        // SPECIES CRUD
        Route::get('species', 'SpeciesCRUD@species')
        ->name('admin.species');

        Route::get('specie/new', 'SpeciesCRUD@newSpecie')
        ->name('admin.newSpecie');

        Route::get('specie/{specie}', 'SpeciesCRUD@specie')
        ->name('admin.specie');

        Route::post('specie/create', 'SpeciesCRUD@createSpecie')
        ->name('admin.createSpecie');

        Route::put('specie/{specie}', 'SpeciesCRUD@updateSpecie')
        ->name('admin.updateSpecie');

        Route::delete('specie/{specie}', 'SpeciesCRUD@deleteSpecie')
        ->name('admin.deleteSpecie');

        // LOCATIONS CRUD
        Route::get('locations', 'LocationsCRUD@locations')
        ->name('admin.locations');

        Route::get('location/new', 'LocationsCRUD@newLocation')
        ->name('admin.newLocation');

        Route::get('location/{location}', 'LocationsCRUD@location')
        ->name('admin.location');

        Route::post('location/create', 'LocationsCRUD@createLocation')
        ->name('admin.createLocation');

        Route::put('location/{location}', 'LocationsCRUD@updateLocation')
        ->name('admin.updateLocation');

        Route::delete('location/{location}', 'LocationsCRUD@deleteLocation')
        ->name('admin.deleteLocation');

        // SPECIES LOCATIONS CRUD
        Route::get('speciesLocations', 'SpeciesLocationsCRUD@speciesLocations')
        ->name('admin.speciesLocations');

        Route::get('specieLocation/new', 'SpeciesLocationsCRUD@newSpecieLocation')
        ->name('admin.newSpecieLocation');

        Route::get('specieLocation/{specieLocation}', 'SpeciesLocationsCRUD@specieLocation')
        ->name('admin.specieLocation');

        Route::post('specieLocation/create', 'SpeciesLocationsCRUD@createSpecieLocation')
        ->name('admin.createSpecieLocation');

        Route::put('specieLocation/{specieLocation}', 'SpeciesLocationsCRUD@updateSpecieLocation')
        ->name('admin.updateSpecieLocation');

        Route::delete('specieLocation/{specieLocation}', 'SpeciesLocationsCRUD@deleteSpecieLocation')
        ->name('admin.deleteSpecieLocation');

        // PET FISHES CRUD
        Route::get('petFishes', 'PetFishesCRUD@petFishes')
        ->name('admin.petFishes');

        Route::get('petFish/new', 'PetFishesCRUD@newPetFish')
        ->name('admin.newPetFish');

        Route::get('petFish/{petFish}', 'PetFishesCRUD@petFish')
        ->name('admin.petFish');

        Route::post('petFish/create', 'PetFishesCRUD@createPetFish')
        ->name('admin.createPetFish');

        Route::put('petFish/{petFish}', 'PetFishesCRUD@updatePetFish')
        ->name('admin.updatePetFish');

        Route::delete('petFish/{petFish}', 'PetFishesCRUD@deletePetFish')
        ->name('admin.deletePetFish');

        // FOOD FISHES CRUD
        Route::get('foodFishes', 'FoodFishesCRUD@foodFishes')
        ->name('admin.foodFishes');

        Route::get('foodFish/new', 'FoodFishesCRUD@newFoodFish')
        ->name('admin.newFoodFish');

        Route::get('foodFish/{foodFish}', 'FoodFishesCRUD@foodFish')
        ->name('admin.foodFish');

        Route::post('foodFish/create', 'FoodFishesCRUD@createFoodFish')
        ->name('admin.createFoodFish');

        Route::put('foodFish/{foodFish}', 'FoodFishesCRUD@updateFoodFish')
        ->name('admin.updateFoodFish');

        Route::delete('foodFish/{foodFish}', 'FoodFishesCRUD@deleteFoodFish')
        ->name('admin.deleteFoodFish');

        // FISH ORDERS CRUD
        Route::get('fishOrders', 'FishOrdersCRUD@fishOrders')
        ->name('admin.fishOrders');

        Route::get('fishOrder/new', 'FishOrdersCRUD@newFishOrder')
        ->name('admin.newFishOrder');

        Route::get('fishOrder/{fishOrder}', 'FishOrdersCRUD@fishOrder')
        ->name('admin.fishOrder');

        Route::post('fishOrder/create', 'FishOrdersCRUD@createFishOrder')
        ->name('admin.createFishOrder');

        Route::put('fishOrder/{fishOrder}', 'FishOrdersCRUD@updateFishOrder')
        ->name('admin.updateFishOrder');

        Route::delete('fishOrder/{fishOrder}', 'FishOrdersCRUD@deleteFishOrder')
        ->name('admin.deleteFishOrder');
    }
);

// Errors
Route::get('/403', 'App\Http\Controllers\errorController@forbidden')
->name('error.forbidden');
});