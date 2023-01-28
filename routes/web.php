<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('posts', PostController::class);
    Route::get('/posts/upvote/{post}', [PostController::class, 'upVote'])->name('posts.upvote');
    Route::get('/posts/downvote/{post}', [PostController::class, 'downVote'])->name('posts.downvote');
    Route::get('/posts/tag/{tag}', [PostController::class, 'tagPosts'])->name('posts.tagPosts');
    Route::post('/comments/{post}', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
});

require __DIR__.'/auth.php';
