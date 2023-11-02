<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WpController;

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
});

Route::get('/refreshToken',[WpController::class, 'refreshToken'])->name('refreshToken');
// Route::get('/refreshToken', 'App\Http\Controllers\WpController', 'refreshToken')->name('refreshToken');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('codigo_iata', 'App\Http\Controllers\Codigo_IataController')->middleware(['auth:sanctum', 'verified']);
Route::resource('equipos', 'App\Http\Controllers\EquiposController')->middleware(['auth:sanctum', 'verified']);
Route::resource('estados', 'App\Http\Controllers\EstadosController')->middleware(['auth:sanctum', 'verified']);
Route::resource('tickets', 'App\Http\Controllers\TicketsController')->middleware(['auth:sanctum', 'verified']);
Route::resource('tickets_mensajes', 'App\Http\Controllers\Tickets_MensajesController')->middleware(['auth:sanctum', 'verified']);
Route::resource('users', 'App\Http\Controllers\UsersController')->middleware(['auth:sanctum', 'verified']);

// php artisan make:controller Tickets_MensajesController --model=Tickets_Mensajes --resource --requests
