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

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\PostController;

Route::resource('posts', PostController::class);
Route::get('download/{id}', [PostController::class, 'downloadFiles']);

Route::get('/manajemen', [App\Http\Controllers\HomeController::class, 'manage']);
Route::get('/create',  [App\Http\Controllers\HomeController::class, 'input']);

Route::get('delete/{id}', [PostController::class, 'destroy']);
Route::get('/', [PostController::class, 'index'])->name('/');
Route::get('edit/{id}', [PostController::class, 'edit']);
Route::post('update/{id}', [PostController::class, 'update']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
