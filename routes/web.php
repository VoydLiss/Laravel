<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\MainController;
// use App\Http\Controllers\Admin\CategoryController;

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


Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function(){
	Route::get('/', [MainController::class, 'index'])->name('admin.index');
	Route::resource('/categories', "\App\Http\Controllers\Admin\CategoryController");
	Route::resource('/posts', "\App\Http\Controllers\Admin\PostController");
	Route::resource('/org', "\App\Http\Controllers\Admin\OrgController");
	Route::resource('/register', "\App\Http\Controllers\UserController");
});

Route::group(['middleware' => 'guest'], function(){
	Route::get('/login',[UserController::class,'loginForm'])->name('login.create');
	Route::post('/login',[UserController::class,'login'])->name('login');
});

Route::group(['middleware'=> 'auth'], function(){
	Route::get('/logout',[UserController::class,'logout'])->name('logout');
	Route::get('/article/{slug}', [PostController::class, 'show'])->name('posts.single');
	Route::get('/', [ HomeController::class, 'index'])->name('home');
	Route::get('/{slug}', [ HomeController::class, 'show'])->name('show');
});

