<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/index', [BlogController::class, 'index'])->name('index');
Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogscreate');
Route::post('/blogs/store', [BlogController::class, 'store'])->name('blogstore');

Route::get('/author/{authorId}', [BlogController::class, 'getBlogsByAuthor'])->name('BlogsByAuthor');
Route::get('/post/{id}', [BlogController::class, 'show']);
Route::post('/comment/store', [BlogController::class, 'commentStore'])->name('comment.store');
Route::delete('/comment/{id}', [BlogController::class, 'destroy'])->name('comment.delete');
Route::get('/comment/{comment}/edit', [BlogController::class, 'edit'])->name('comment.edit');
Route::put('/comment/{comment}', [BlogController::class, 'update'])->name('comment.update');

Route::get('/category/{categoryId}', [BlogController::class, 'getBlogsByCategory'])->name('BlogsByCategory');
Route::get('/tags', [BlogController::class, 'getAllCategories'])->name('BlogsByCategory');


Route::get('/about-us', function () {
    return view('about-us');
});

require __DIR__.'/auth.php';
