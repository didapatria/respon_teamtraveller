<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminBrandController;

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

Route::get('/', [PostController::class, 'index']);
Route::get('/detail/{post:slug}', [PostController::class, 'show']);

Route::get('/brands', [BrandController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [AdminPostController::class, 'checkSlug'])->middleware('admin');
Route::resource('/dashboard/posts', AdminPostController::class)->middleware('admin');

Route::get('/dashboard/brands/checkSlug', [AdminBrandController::class, 'checkSlug'])->middleware('admin');
Route::resource('/dashboard/brands', AdminBrandController::class)->except('show')->middleware('admin');

Route::resource('/dashboard/users', AdminUserController::class)->except('create, store, show')->middleware('admin');
