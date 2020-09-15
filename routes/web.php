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

Route::get('greeting/hello/{name}', [\App\Http\Controllers\GreetingController::class, 'hello'])->name('greeting.hello');

Route::get('user/{user}/categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
Route::get('categories/create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');
Route::post('categories', [\App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');
