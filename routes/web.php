<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function(){
    Route::get('add-post',[PostController::class,'create'])->name('post.add');
    Route::post('store-post',[PostController::class,'store'])->name('post.store');
    Route::get('notification',[UserController::class,'notification'])->name('notification');
    Route::get('markasread/{id}',[UserController::class,'markasread'])->name('markasread');
});
Route::get('post-index',[PostController::class,'index'])->name('post.index');


