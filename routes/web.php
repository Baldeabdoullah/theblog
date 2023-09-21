<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
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

// Route::get('/', function () {
//     return view('post.index');
// });

Route::get('/', [PostController::class, 'index'])->name('posts');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [CategorieController::class, 'index'])->name('dashboard');

//posts
//posts create
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts/create', [PostController::class, 'store'])->name('posts.store');

//posts edit
Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/edit/{id}', [PostController::class, 'update'])->name('posts.update');
//posts delete
Route::delete('/posts/delete/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

// categorie
//categorie create
Route::get('/categories/create', [CategorieController::class, 'create'])->name('categories.create');
Route::post('/categories/create', [CategorieController::class, 'store'])->name('categories.store');

//categorie edit

//categorie delete
Route::delete('/categories/delete/{id}', [CategorieController::class, 'destroy'])->name('categories.destroy');

Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
