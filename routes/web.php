<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\CommentController;
use \App\Http\Middleware\Language;

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

Route::get('/admin/login', [App\Http\Controllers\Admin\HomeController::class, 'index']);
Route::post('/admin/store', [App\Http\Controllers\Admin\HomeController::class, 'store'])->name('login.store');

Route::post('/admin/index', [App\Http\Controllers\Admin\HomeController::class, 'show_index'])->name('show.index');
Route::post('/admin/post_store', [App\Http\Controllers\Admin\HomeController::class, 'post_store'])->name('post.store');
Route::post('/logout', [App\Http\Controllers\Auth\HomeController::class, 'logout'])->name('logout');

Route::middleware(['language'])->group(function (){
    Route::get('/', [App\Http\Controllers\PostController::class, 'index']);
    Route::get('locale/{locale}', [App\Http\Controllers\PostController::class, 'changelocale'])->name('locale'); 
    Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
    // Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
    Route::post('/register/create', [App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('register.create');
    Route::post('/register/store', [App\Http\Controllers\Auth\RegisterController::class, 'store'])->name('register.store');
    // forgot-passord
    Route::get('/forgot-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'create'])->name('forgot.password');
    Route::post('/forgot-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'store'])->name('email.password');
    // Route::get('/reset-password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'create'])->name('password.reset');
     // forgot-passord
    Route::post('/register/store', [App\Http\Controllers\Auth\RegisterController::class, 'store'])->name('register.store');
    Route::get('/register/rezident', [App\Http\Controllers\Auth\RegisterController::class, 'rezident'])->name('show.rezident');
    Route::post('/logout', [App\Http\Controllers\Auth\RegisterController::class, 'logout'])->name('logout');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'home']);
    Route::get('/home/get_likes/{id}', [App\Http\Controllers\LikesController::class, 'get_likes'])->name('get.like');
    Route::post('/home/likes', [App\Http\Controllers\LikesController::class, 'store'])->name('like.store');
    Route::get('/reviews', [App\Http\Controllers\LikesController::class, 'index'])->name('show.reviews');
    Route::post('/home/create', [App\Http\Controllers\CommentController::class, 'create'])->name('comment.create');
    Auth::routes();
    Route::get('/mainmenu', [App\Http\Controllers\HomeController::class, 'mainmenu'])->name('mainmenu');
    
});





