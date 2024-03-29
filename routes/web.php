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

Route::get('/', [App\Http\Controllers\DefaultController::class, 'home'])->name('home');
Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
Route::get('/users/register', [App\Http\Controllers\UserController::class, 'register'])->name('register');
Route::get('/posts/{id}', [App\Http\Controllers\PostController::class, 'show'])->name('posts.show');
Route::post('/users/signup', [App\Http\Controllers\UserController::class, 'signup'])->name('signup');
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::post('/posts/{id}/comments', [App\Http\Controllers\CommentController::class, 'store'])->name('posts.comments');
Route::get('/users/login', [App\Http\Controllers\UserController::class, 'login'])->name('login');
Route::post('/users/signin', [App\Http\Controllers\UserController::class, 'signin'])->name('signin');
Route::get('/users/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');
Route::get('/ajax/users', [App\Http\Controllers\UserController::class, 'search'])->name('users.search');
Route::get('/users/profile', [App\Http\Controllers\UserController::class, 'show'])->name('users.profile');
Route::get('/users/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::post('/users/update', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');