<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

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

Route::get('/post', [PostController::class, 'tampil']);
Route::get('/category', [CategoryController::class, 'tampil']);
Route::resource('posts', PostController::class);
Route::resource('categories', CategoryController::class);