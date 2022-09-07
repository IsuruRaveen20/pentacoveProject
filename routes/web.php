<?php

use App\Http\Controllers\BookingRequestController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DonationRequestController;
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

// Post Management
// Route::prefix('users')->group(function () {
//     Route::get('/', [VisitorRequestController::class, "index"])->name('user.all');
//     Route::get('/new', [CategoryController::class, "new"])->name('user.new');
//     Route::post('/store', [CategoryController::class, "store"])->name('user.store');
//     Route::get('/{user_id}/edit', [CategoryController::class, "edit"])->name('user.edit');
//     Route::get('/{user_id}/view', [VisitorRequestController::class, "view"])->name('user.view');
//     Route::post('/{user_id}/update', [CategoryController::class, "update"])->name('user.update');
//     Route::get('/{user_id}/delete', [VisitorRequestController::class, "delete"])->name('user.delete');
//     Route::get('/change/status/{user_id}', [CategoryController::class, "changeStatus"])->name('user.status.change');
// });

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

//donations request
// Route::prefix('donations')->group(function () {
//     Route::get('/', [DonationRequestController::class, "index"])->name('donations.all');
//     Route::get('/{request_id}/view', [DonationRequestController::class, "view"])->name('donations.view');
//     Route::get('/{request_id}/delete', [DonationRequestController::class, "delete"])->name('donations.delete');
// });

//volunteers request
// Route::prefix('volunteers')->group(function () {
//     Route::get('/', [VolunteerRequestController::class, "index"])->name('volunteers.all');
//     Route::get('/{request_id}/view', [VolunteerRequestController::class, "view"])->name('volunteers.view');
//     Route::get('/{request_id}/delete', [VolunteerRequestController::class, "delete"])->name('volunteers.delete');
// });

//Settings
// Route::prefix('/settings')->group(function () {
//     Route::get('/social', [SettingController::class, "social"])->name('settings.social');
//     Route::get('/contact', [SettingController::class, "contact"])->name('settings.contact');
//     Route::get('/day', [SettingController::class, "day"])->name('settings.day');
//     Route::get('/restaurant', [SettingController::class, "restaurant"])->name('settings.restaurant');

//     Route::post('/update/social', [SettingController::class, "socialUpdate"])->name('settings.update.social');
//     Route::post('/update/contact', [SettingController::class, "contactUpdate"])->name('settings.update.contact');
//     Route::post('/update/day', [SettingController::class, "dayUpdate"])->name('settings.update.day');
//     Route::post('/update/restaurant', [SettingController::class, "restaurantUpdate"])->name('settings.update.restaurant');
// });
