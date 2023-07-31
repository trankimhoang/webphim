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

Route::get('/', [\App\Http\Controllers\Web\HomeController::class, 'index'])->name('index');
Route::get('/danh-muc', [\App\Http\Controllers\Web\HomeController::class, 'category'])->name('category');
Route::get('/the-loai', [\App\Http\Controllers\Web\HomeController::class, 'genre'])->name('genre');
Route::get('/quoc-gia', [\App\Http\Controllers\Web\HomeController::class, 'country'])->name('country');
Route::get('/phim', [\App\Http\Controllers\Web\HomeController::class, 'movie'])->name('movie');
Route::get('/xem-phim', [\App\Http\Controllers\Web\HomeController::class, 'watch'])->name('watch');
Route::get('/episode', [\App\Http\Controllers\Web\HomeController::class, 'episode'])->name('episode');
