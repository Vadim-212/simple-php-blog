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
    Route::put('posts/{post}/like', [\App\Http\Controllers\LikeController::class, 'toggle'])->name('likes.toggle');
    Route::resource('todos', \App\Http\Controllers\TodoController::class)->except('index');
});
Route::get('user/{user}/categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');

Route::resource('posts', \App\Http\Controllers\PostController::class)->only('index', 'show');

Route::get('users/{user}/posts', [\App\Http\Controllers\PostController::class, 'byUser'])->name('user.posts');
Route::get('categories/{category}/posts', [\App\Http\Controllers\PostController::class, 'byCategory'])->name('category.posts');

Route::get('todos', [\App\Http\Controllers\TodoController::class, 'index'])->name('todos.index');
