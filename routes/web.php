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

Auth::routes();

Route::get('/', [App\Http\Controllers\SiteController::class, 'index'])->name('index');
Route::get('about', [\App\Http\Controllers\SiteController::class, 'about'])->name('about');

Route::middleware('auth')->group(function () {
    Route::resource('categories', \App\Http\Controllers\CategoryController::class)->except('index');
    Route::resource('posts', \App\Http\Controllers\PostController::class)->except('index', 'show');
});
Route::get('user/{user}/categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');

Route::resource('posts', \App\Http\Controllers\PostController::class)->only('index', 'show');
