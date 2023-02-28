<?php

use App\Http\Controllers\BlogController;
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

Route::get('/categories/{category}', [BlogController::class, 'category'])->name('blog.category');

Route::get('/posts/{post}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/', [BlogController::class, 'index'])->name('blog.index');
