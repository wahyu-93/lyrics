<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\BandController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SongController;
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

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('search', [SearchController::class, 'band']);
Route::get('/search/genre/{genre}', [SearchController::class, 'genre'])->name('search.genre');

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

Route::group(['prefix' => 'album'], function () {
    Route::get('create', [AlbumController::class, 'create'])->name('album.create');
    Route::post('create', [AlbumController::class, 'store'])->name('album.store');
    Route::put('/{album}/update', [AlbumController::class, 'update'])->name('album.update');
    Route::get('{id}', [AlbumController::class, 'getAllAlbumById']);
});

Route::group(['prefix' => 'song'], function () {
    Route::get('create', [SongController::class, 'create'])->name('song.create');
    Route::post('create', [SongController::class, 'store'])->name('song.store');
    Route::get('/{band}/{song}', [SongController::class, 'show'])->name('song.show');
    Route::get('{song}', [SongController::class, 'edit'])->name('song.edit');
    Route::put('{song}', [SongController::class, 'update'])->name('song.update');
});
