<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SuperCategoryController;
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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [SuperCategoryController::class, 'index']);
Route::get('/{category}', [CategoryController::class, 'index']);
Route::get('/{super_category}/{category}', [CategoryController::class, 'show']);
