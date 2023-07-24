<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SearchController;
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

Route::get('/test', [PostController::class,'test']);

Route::get('/timeline', [UserController::class,'timeline'])->middleware('auth'); 
Route::get('/posts/{post}',[PostController::class,'show']);

Route::post('/like/{post}', [PostController::class, 'like'])->name('like');
Route::delete('/unlike/{post}', [PostController::class, 'unlike'])->name('unlike');

Route::post('/posts/{post}/comment',[CommentController::class,'store'])->name('comment');

Route::get('/users/{name}',[UserController::class,'show_user']);

Route::get('/categories/{category}/create',[PostController::class,'create'])->middleware('auth');
Route::post('/posts',[PostController::class,'store'])->middleware('auth');

Route::get('/posts/{post}/edit',[PostController::class,'edit'])->middleware('auth');
Route::put('/posts/{post}',[PostController::class,'update'])->middleware('auth');

Route::get('/search', [SearchController::class,'search'])->middleware('auth'); 

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
