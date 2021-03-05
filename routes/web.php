<?php

use App\Http\Controllers\FollowsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfilesController;
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

Route::get('/', function () {
    return redirect('/profile/' . Auth::user()->username);
//    return view('welcome');
})->middleware('auth');

Auth::routes();

Route::post('/follow/{user}', [FollowsController::class, 'store']);

Route::get('/profile/{user}', [ProfilesController::class, 'index'])->name('user.show');
Route::get('/profile/{user}/edit', [ProfilesController::class, 'edit'])->name('user.edit');
Route::patch('/profile/{user}', [ProfilesController::class, 'update'])->name('user.update');

Route::get('/post/create', [PostController::class, 'create']);
Route::post('/post', [PostController::class, 'store']);
Route::get('/post/{post}', [PostController::class, 'show']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
