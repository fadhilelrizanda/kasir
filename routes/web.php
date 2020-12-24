<?php

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
    return view('welcome');
});

use App\Http\Controllers\PostController;

Route::resource('posts', PostController::class);
Route::get('download/{id}', [PostController::class, 'downloadFiles']);
Route::get('manajemen', [PostController::class, 'manajemen']);
Route::get('delete/{id}', [PostController::class, 'destroy']);
Route::get('edit/{id}', [PostController::class, 'edit']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');