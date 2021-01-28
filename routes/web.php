<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QuestionController;
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

Route::get('/', function () {return view('startseite');});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/super-category', [SuperCategoryController::class, 'index'])->name('super-category');
Route::get('/{category}', [CategoryController::class, 'index'])->name('category');
Route::get('/{category}/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/{category}/store', [CategoryController::class, 'store'])->name('category.store');
Route::post('/{super_category}/{category}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::get('/{super_category}/{category}', [CategoryController::class, 'show'])->name('category.show');

Route::get('/{super_category}/{category}/create', [QuestionController::class, 'create'])->name('question.create');
Route::post('/{super_category}/{category}/store', [QuestionController::class, 'store'])->name('question.store');
Route::get('/{super_category}/{category}/{question}/destroy', [QuestionController::class, 'destroy'])->name('question.destroy');


Route::post('/check-answers/{category}', [QuestionController::class, 'index'])->name('answer');
