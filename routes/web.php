<?php

use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Post\StorePostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
     return redirect('/post');
});

Route::get('post', [PostController::class, 'post'])->name('post.post');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


