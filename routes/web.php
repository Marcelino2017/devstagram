<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Comments\CommentController;
use App\Http\Controllers\Images\ImageController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\Posts\PostController;
use App\Http\Controllers\Profiles\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('{user:username}/edit-profile', [ProfileController::class, 'index'])->name('profile.index');
Route::post('{user:username}/edit-profile', [ProfileController::class, 'store'])->name('profile.store');

//este endpoint nos permitira saber tener una url con username del user
Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/{user:username}/post/{post}', [PostController::class, 'show'])->name('posts.show');
Route::post('/{user:username}/posts/{post}', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/posts/{post}',  [PostController::class, 'destroy'])->name('posts.destroy');

Route::post('/images', [ImageController::class, 'store'])->name('image.store');

Route::post('posts/{post}/likes', [LikeController::class, 'store'])->name('posts.likes.store');
Route::delete('posts/{post}/likes', [LikeController::class, 'destroy'])->name('posts.likes.destroy');


