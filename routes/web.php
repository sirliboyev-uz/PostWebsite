<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $posts = [];    
    if(Auth::check()){
        $posts = Auth::user()->usersCoolPosts()->latest()->get();
    }
    //$posts = Post::where('user_id', Auth::id())->get();
    return view('home',['posts'=> $posts]);
});

Route:: post('/register', [UserController::class, 'register']);
Route:: post('/logout', [UserController::class, 'logout']);
Route:: post('/login', [UserController::class, 'login']);

Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}', [PostController::class, 'actuallyUpdatePost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);
