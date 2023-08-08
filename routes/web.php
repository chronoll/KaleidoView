<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RelationshipController;
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
Route::get('/posts/{post}',[PostController::class,'show'])->name('posts.show')->middleware('auth');
Route::delete('/posts/{post}',[PostController::class,'delete'])->middleware('auth');

Route::post('/like/{post}', [PostController::class, 'like'])->name('like');
Route::delete('/unlike/{post}', [PostController::class, 'unlike'])->name('unlike');

Route::post('/follow/{category}',[RelationshipController::class,'follow'])->name('follow');
Route::delete('/unfollow/{category}',[RelationshipController::class,'unfollow'])->name('unfollow');

Route::post('/posts/{post}/comment',[CommentController::class,'store'])->name('comment');
Route::delete('/comments/{comment}',[CommentController::class,'delete'])->middleware('auth');

Route::get('/users/{name}',[UserController::class,'show_user'])->name('users.show')->middleware('auth');

Route::get('/users/{name}/edit',[UserController::class,'edit']);
Route::put('/users/{name}',[UserController::class,'update']);

Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create')->middleware('auth');
Route::post('/categories',[CategoryController::class,'store'])->middleware('auth');

Route::get('/categories/{category}/edit',[CategoryController::class,'edit'])->name('categories.edit')->middleware('auth');
Route::put('/categories/{category}',[CategoryController::class,'update'])->middleware('auth');
Route::delete('/categories/{category}',[CategoryController::class,'delete'])->middleware('auth');

Route::get('/categories/{category}',[CategoryController::class,'index'])->name('categories.show')->middleware('auth');
Route::get('/categories/{category}/create',[PostController::class,'create'])->name('posts.create')->middleware('auth');
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
