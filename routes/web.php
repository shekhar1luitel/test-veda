<?php

use App\Http\Controllers\BlogsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;



Route::group(['middleware' => ['guest']], function () {
    Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');
    Route::get('/login', [LoginController::class, 'show'])->name('login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');

    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/searchuser', [HomeController::class, 'search'])->name('user.search');

    Route::get('/blog', [BlogsController::class, 'index'])->name('blog');
    Route::get('/blog/user', [BlogsController::class, 'blogShow'])->name('blog.show');
    Route::get('/blog/post/{id}', [BlogsController::class, 'blogShowOne'])->name('blog.show.one');


    Route::post('/blog/create', [BlogsController::class, 'blogCreate'])->name('blog.post');

    Route::get('/update/{id}', [BlogsController::class, 'updateShow'])->name('updateshow');
    Route::post('/update/{id}', [BlogsController::class, 'updateBlog'])->name('updateBlog');

    Route::get('/blog/{id}', [BlogsController::class, 'deleteBlog'])->name('deleteBlog');
    Route::get('/delete/{id}', [HomeController::class, 'deleteUser'])->name('delete');
    Route::get('/setting', [HomeController::class, 'index'])->name('setting');
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
});
