<?php

use App\Http\Controllers\PostController;
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
    return view('welcome');
});
Route::get('/posts',[PostController::class, 'index'])->name('posts.show');
Route::get('posts/create', [PostController::class, 'create'])->name('post.create');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('post.show');
Route::post('posts/savepost', [PostController::class, 'save'])->name('post.save');
Route::get('posts/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::put('posts/{id}/update', [PostController::class, 'update'])->name('post.update');
Route::delete('posts/{id}/delete', [PostController::class, 'delete'])->name('post.delete');
