<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
// to show all the blogs
Route::GET('blogs',[BlogController::class,'index'])->name('blog.index');
Route::GET('create',[BlogController::class,'create'])->name('blog.create');
Route::POST('blog',[BlogController::class,'store'])->name('blog.store');
Route::GET('show/{id}',[BlogController::class,'show'])->name('blog.show');
