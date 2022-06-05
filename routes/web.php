<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('about');
});

Route::get('/blog', [PostController::class, 'show'])->middleware('guest');
Route::get('/blog/{post:slug}', [PostController::class, 'detail']);

Route::get('/category', function () {
    return view('categories', [
        "title" => "Category",
        'active' => 'category',
        "categories" => \App\Models\Category::all()
    ]);
})->middleware('guest');
