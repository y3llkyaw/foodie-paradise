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

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'adminView'])->name('adminView');
Route::get('/admin/orders', [App\Http\Controllers\HomeController::class, 'adminOrders'])->name('adminOrders');

Route::post('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');


Route::get('/foods/create', [App\Http\Controllers\FoodController::class, 'createFoods'])->name('foods.create.show');
Route::get('/foods/edit/{food}', [App\Http\Controllers\FoodController::class, 'editFoods'])->name('foods.update.show');


Route::post('/foods', [App\Http\Controllers\FoodController::class, 'storeFoods'])->name('foods.store');
Route::patch('/foods/{id}', [App\Http\Controllers\FoodController::class, 'update'])->name('foods.update');
Route::post('/foods/delete/{food}', [App\Http\Controllers\FoodController::class, 'delete'])->name('foods.delete');

Route::post('/order/{user}', [App\Http\Controllers\OrderController::class, 'add'])->name('order.add');
Route::post('/order/delete/{id}', [App\Http\Controllers\OrderController::class, 'delete'])->name('order.delete');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/{type}', [App\Http\Controllers\HomeController::class, 'indexQ'])->name('home.type');

