<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/vehicle', [App\Http\Controllers\VehicleController::class, 'index'])->name('vehicle.index');
Route::get('/vehicle/create', [App\Http\Controllers\VehicleController::class, 'create'])->name('vehicle.create');
Route::post('/vehicle/store', [App\Http\Controllers\VehicleController::class, 'store'])->name('vehicle.store');
Route::get('/vehicle/edit/{id}', [App\Http\Controllers\VehicleController::class, 'edit'])->name('vehicle.edit');
Route::post('/vehicle/update/{id}', [App\Http\Controllers\VehicleController::class, 'update'])->name('vehicle.update');
Route::get('/vehicle/delete/{id}', [App\Http\Controllers\VehicleController::class, 'destroy'])->name('vehicle.delete');

Route::get('/order/{id}', [App\Http\Controllers\OrderController::class, 'index'])->name('order.index');
Route::get('/order/{id}/create', [App\Http\Controllers\OrderController::class, 'create'])->name('order.create');
Route::post('/order/{id}/store', [App\Http\Controllers\OrderController::class, 'store'])->name('order.store');
Route::get('/order/delete/{orderId}', [App\Http\Controllers\OrderController::class, 'destroy'])->name('order.delete');
Route::get('/order/edit/{id}', [App\Http\Controllers\OrderController::class, 'edit'])->name('order.edit');
Route::post('/order/update/{id}', [App\Http\Controllers\OrderController::class, 'update'])->name('order.update');

Route::get('/customer', [App\Http\Controllers\CustomerController::class, 'index'])->name('customer.index');
Route::get('/customer/create', [App\Http\Controllers\CustomerController::class, 'create'])->name('customer.create');
Route::post('/customer/store', [App\Http\Controllers\CustomerController::class, 'store'])->name('customer.store');
Route::get('/customer/edit/{id}', [App\Http\Controllers\CustomerController::class, 'edit'])->name('customer.edit');
Route::post('/customer/update/{id}', [App\Http\Controllers\CustomerController::class, 'update'])->name('customer.update');
Route::get('/customer/delete/{id}', [App\Http\Controllers\CustomerController::class, 'destroy'])->name('customer.delete');

Auth::routes();
