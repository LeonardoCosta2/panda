<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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



Route::get('/', [PostController::class, 'posts'])->name('posts');
Route::get('admin', [PostController::class, 'index'])->name('admin');


Route::post('post.img.do', [PostController::class, 'uploadImagePost'])->name('posts.img.do');
Route::post('posts.do', [PostController::class, 'store'])->name('posts.do');