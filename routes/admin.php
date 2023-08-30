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

Route::get('index', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('index');

Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
Route::resource('countries', \App\Http\Controllers\Admin\CountryController::class);
Route::resource('genres', \App\Http\Controllers\Admin\GenreController::class);
Route::resource('movies', \App\Http\Controllers\Admin\MovieController::class);
Route::resource('episodes', \App\Http\Controllers\Admin\EpisodeController::class);
