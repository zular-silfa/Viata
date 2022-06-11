<?php

use App\Http\Controllers\MakananController;
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

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');

Route::resource('viata_users', \App\Http\Controllers\ViataUsersController::class)
    ->middleware('auth');


Route::resource('perawatan', \App\Http\Controllers\PerawatanController::class)
    ->middleware('auth');
Route::resource('makanan', MakananController::class)->except('show')
    ->middleware('auth');
Route::resource('penyakit', \App\Http\Controllers\PenyakitController::class)
    ->middleware('auth');
