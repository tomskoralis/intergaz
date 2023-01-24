<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DeliveryController;
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
    return view('welcome');
})->name('welcome');

Route::get('/clients', [ClientController::class, 'index'])
    ->name('client.index');

Route::post('/addresses', [AddressController::class, 'show'])
    ->name('addresses');

Route::get('/deliveries/{id}', [DeliveryController::class, 'show'])
    ->name('deliveries');

Route::get('/delivery-types', [AddressController::class, 'index'])
    ->name('delivery-types');

Route::get('/deliveries-recent', [DeliveryController::class, 'recent'])
    ->name('recent-deliveries');

Route::get('/clients-inactive', [ClientController::class, 'inactive'])
    ->name('inactive-clients');
