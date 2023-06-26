<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Uzivatel_Controller;

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
    $posts = [];
    if (auth()->check()) {
        $posts = auth()->user()->posty()->latest()->get();
    }
    return view('home', ['posts' => $posts]);
});

Route::post('/register', [Uzivatel_Controller::class, 'registrace']);

Route::post('/logout', [Uzivatel_Controller::class, 'logout']);

Route::post('/login', [Uzivatel_Controller::class, 'login']);

//post routes

Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}', [PostController::class, 'updatePost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);


