<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SuperCategoryController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/super-category', [SuperCategoryController::class, 'index'])->name('super-category');
Route::get('/super-category/{category}', [CategoryController::class, 'index'])->name('category');
Route::get('/super-category/{category}/create', [CategoryController::class, 'create'])->name('category.create');
Route::get('/super-category/{super_category}/{category}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/super-category/{super_category}/{category}', [CategoryController::class, 'show'])->name('category.show');
Route::post('/check-answers', [AnswerController::class, 'index'])->name('answer');
