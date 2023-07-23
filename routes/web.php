<?php

use App\Http\Controllers\BandController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Auth;
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

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'genre'], function () {
    Route::get('create', [GenreController::class, 'create'])->name('genre.create');
    Route::post('store', [GenreController::class, 'store'])->name('genre.store');
});

Route::group(['prefix' => 'band'], function () {
    Route::get('index', [BandController::class, 'index'])->name('band.index');
    Route::get('create', [BandController::class, 'create'])->name('band.create');
    Route::post('store', [BandController::class, 'store'])->name('band.store');
    Route::get('/{band}', [BandController::class, 'show'])->name('band.show');
    Route::get('/{band}/edit', [BandController::class, 'edit'])->name('band.edit');
    Route::put('/{band}/edit', [BandController::class, 'update'])->name('band.update');
});
