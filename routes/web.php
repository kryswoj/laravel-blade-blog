<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
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
    ->name('home.index')
    ->middleware('auth');

Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');

Route::get('/secret', [HomeController::class, 'secret'])
    ->name('home.secret')
    ->middleware('can:home.secret');

Route::get('/about', AboutController::class);

Route::resource('posts', PostsController::class);

Auth::routes();


// Route::get('/posts', function(Request $request) use ($posts) {
//     // dd($request->all());
//     dd($request->input('page', 1));

//     //Difference between query and input is, that query is loooking for query parameter only,
//     //input will look for the names in all the posible input sources - query parameters, data sent through a form, json etc.

//     dd($request->query('page', 1));
//     return view('posts.index', ['posts' => $posts]);
// });

// Route::get('/posts/{id}', function ($id) use ($posts) {

//     abort_if(!isset($posts[$id]), 404);

//     return view('posts.show', ['post' => $posts[$id]]);
// })->name('posts.show');


// Route::prefix('/fun')->name('fun.')->group(function () use ($posts) {

//     Route::get('/fun/responses', function () use ($posts) {
//         return response($posts, 201)
//             ->header('Content-Type', 'application/json')
//             ->cookie('MY_COOKIE', 'Krystian Wojciechowski', 3600);
//     });

//     Route::get('/redirect', function () {
//         return redirect('/contact');
//     })->name('redirect');

//     Route::get('/back', function () {
//         return back();
//     })->name('back');

//     Route::get('/named-route', function () {
//         return redirect()->route('posts.show', ['id' => 1]);
//     })->name('named-route');

//     Route::get('/away', function () {
//         return redirect()->away('https://google.com');
//     })->name('away');

//     Route::get('/json', function () use ($posts) {
//         return response()->json($posts);
//     })->name('json');

//     Route::get('/download', function () {
//         return response()->download(public_path('/bluebike.png'), 'somebike.png', []);
//     })->name('download');

// });

