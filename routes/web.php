<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PostTagController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\UserCommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserFavouritePostsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', [HomeController::class, 'home'])
    ->name('posts.index')
    ->middleware('auth');

Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');

Route::get('/secret', [HomeController::class, 'secret'])
    ->name('home.secret')
    ->middleware('can:home.secret');

Route::get('/about', AboutController::class);

Route::resource('posts', PostsController::class);
Route::resource('posts.comments', PostCommentController::class)->only(['store', 'index']);
Route::resource('users.comments', UserCommentController::class)->only(['store']);
Route::resource('users', UserController::class)->only(['show', 'edit', 'update']);

Route::resource('posts.favourite', UserFavouritePostsController::class)->only(['store']);
Route::get('favourites', [UserFavouritePostsController::class, 'index'])->name('posts.favourite.index');
Route::delete('posts/{post}/favourite', [UserFavouritePostsController::class, 'destroy'])->name('posts.favourite.destroy');

Route::get('/posts/tag/{id}', [PostTagController::class, 'index'])->name('post.tags.index');

Route::get('mailable', function () {
    $comment = App\Models\Comment::find(1);
    return new App\Mail\CommentPostedMarkdown($comment);
});

Auth::routes();
