<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;


Route::get('/', [UserController::class, 'register'])->name('register');
Route::post('/registerpost', [UserController::class, 'register_post'])->name('register.post');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/loginpost', [UserController::class, 'loginpost'])->name('login.post');
Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::get('/profile', [BlogController::class, 'profile'])->middleware('auth')->name('profile');
Route::get('/blog', [BlogController::class, 'blog'])->middleware('auth')->name('blog');
Route::post('/blogpost', [BlogController::class, 'blogpost'])->middleware('auth')->name('blog.post');
Route::post('/comment', [BlogController::class, 'storeComment'])->middleware('auth')->name('comment.store');
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');
Route::post('/logout', [BlogController::class, 'logout'])->name('logout');

