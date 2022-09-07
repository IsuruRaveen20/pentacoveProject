<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, "index"])->name('dashboard');

//categories
Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, "index"])->name('categories.all');
    Route::get('/new', [CategoryController::class, "new"])->name('categories.new');
    Route::post('/store', [CategoryController::class, "store"])->name('categories.store');
    Route::get('/{category_id}/edit', [CategoryController::class, "edit"])->name('categories.edit');
    Route::post('/{category_id}/update', [CategoryController::class, "update"])->name('categories.update');
    Route::get('/{category_id}/delete', [CategoryController::class, "delete"])->name('categories.delete');
    Route::get('/change/status/{category_id}', [CategoryController::class, "changeStatus"])->name('categories.status.change');
});

// Articles Management
Route::prefix('articles')->group(function () {
    Route::get('/', [ArticleController::class, "index"])->name('articles.all');
    Route::get('/new', [ArticleController::class, "new"])->name('articles.new');
    Route::post('/store', [ArticleController::class, "store"])->name('articles.store');
    Route::get('/{article_id}/edit', [ArticleController::class, "edit"])->name('articles.edit');
    Route::get('/{article_id}/view', [ArticleController::class, "view"])->name('articles.view');
    Route::post('/{article_id}/update', [ArticleController::class, "update"])->name('articles.update');
    Route::get('/{article_id}/delete', [ArticleController::class, "delete"])->name('articles.delete');
    Route::get('/change/status/{article_id}', [ArticleController::class, "changeStatus"])->name('articles.status.change');
    Route::post('/store/image', [ArticleController::class, "storeImage"])->name('articles.store.image');
});

//User Management
Route::prefix('employees')->group(function () {
    Route::get('/', [EmployeeController::class, "index"])->name('employees.all');
    Route::get('/new', [EmployeeController::class, "new"])->name('employees.new');
    Route::post('/store', [EmployeeController::class, "store"])->name('employees.store');
    Route::get('/{employee_id}/edit', [EmployeeController::class, "edit"])->name('employees.edit');
    Route::get('/{employee_id}/view', [EmployeeController::class, "view"])->name('employees.view');
    Route::post('/{employee_id}/update', [EmployeeController::class, "update"])->name('employees.update');
    Route::get('/{employee_id}/delete', [EmployeeController::class, "delete"])->name('employees.delete');
    Route::get('/change/status/{employee_id}', [EmployeeController::class, "changeStatus"])->name('employees.status.change');
});


