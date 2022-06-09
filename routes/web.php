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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::resource('viata_users', \App\Http\Controllers\ViataUsersController::class)
    ->middleware('auth');

Route::resource('perawatan', \App\Http\Controllers\PerawatanController::class)
    ->middleware('auth');

Route::get('/create', [App\Http\Controllers\PerawatanController::class, 'create'])->name('create');
Route::post('/store', [App\Http\Controllers\PerawatanController::class, 'store'])->name('store');
Route::get('/edit/{id}', [App\Http\Controllers\PerawatanController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [App\Http\Controllers\PerawatanController::class, 'update'])->name('update');
Route::get('/destroy/{id}', [App\Http\Controllers\PerawatanController::class, 'destroy'])->name('destroy');