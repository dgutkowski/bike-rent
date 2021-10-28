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

Route::get('/', [App\Http\Controllers\ReservationController::class, 'index']);

// Auth

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Bikes managment

Route::get('/bikes', [App\Http\Controllers\BikeController::class, 'index'])->name('bikes.index')->middleware('auth');
Route::get('/bikes/create', [App\Http\Controllers\BikeController::class, 'create'])->name('bikes.create')->middleware('auth');
Route::get('/bikes/edit/{bike}', [App\Http\Controllers\BikeController::class, 'edit'])->name('bikes.edit')->middleware('auth');
Route::post('/bikes', [App\Http\Controllers\BikeController::class, 'store'])->name('bikes.store')->middleware('auth');
Route::get('/bikes/{bike}', [App\Http\Controllers\BikeController::class, 'show'])->name('bikes.show')->middleware('auth');
Route::post('/bikes/{bike}', [App\Http\Controllers\BikeController::class, 'update'])->name('bikes.update')->middleware('auth');
Route::delete('/bikes/{bike}', [App\Http\Controllers\BikeController::class, 'destroy'])->name('bikes.delete')->middleware('auth');

// Reservations

Route::get('/reserv/{bike}', [App\Http\Controllers\ReservationController::class, 'show'])->name('reserv.show');
Route::post('/reserv', [App\Http\Controllers\ReservationController::class, 'store'])->name('reserv.store');
Route::get('/', [App\Http\Controllers\ReservationController::class, 'index'])->name('reserv.index');

// User

Route::get('/profile', [App\Http\Controllers\UserController::class, 'edit'])->name('profile.edit')->middleware('auth');

// Other locations

Route::get('/policy', function() { return view('policy'); })->name('policy');
Route::get('/rules', function() { return view('rules'); })->name('rules');
Route::get('/faq', [App\Http\Controllers\FaqController::class, 'index'])->name('faq');
