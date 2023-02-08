<?php

use App\Http\Controllers\BlogController;

use App\Http\Controllers\LoginController;

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

Route::get('/',[BlogController::class,'index'])->name('blogs');
Route::match(['get','post'],'/add-blog',[BlogController::class,'add'])->name('add_blog');
Route::match(['get','post'],'/login',[LoginController::class,'login'])->name('do_login');

Route::post('/comments{id}',[BlogController::class,'comments'])->name('comments');
