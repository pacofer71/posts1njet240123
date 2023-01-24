<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostController;
use App\Models\Post;
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
    $posts=Post::with('user')->where('estado', 'Publicado')->orderBy('id', 'desc')->paginate(5);
    return view('welcome', compact('posts'));
})->name('inicio');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [PostController::class,'index1'])->name('dashboard');
    Route::resource('posts', PostController::class);
    Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
    Route::post('contact', [ContactController::class, 'send'])->name('contact.send');
});
