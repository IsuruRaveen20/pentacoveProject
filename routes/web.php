<?php

use App\Http\Controllers\BookingRequestController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DonationRequestController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\VisitorRequestController;
use App\Http\Controllers\VolunteerRequestController;
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

//Visitor request
// Route::prefix('visitor')->group(function () {
//     Route::get('/', [VisitorRequestController::class, "index"])->name('requests.all');
//     Route::get('/{request_id}/view', [VisitorRequestController::class, "view"])->name('requests.view');
//     Route::get('/{request_id}/delete', [VisitorRequestController::class, "delete"])->name('requests.delete');
// });

//bookings request
// Route::prefix('bookings')->group(function () {
//     Route::get('/', [BookingRequestController::class, "index"])->name('bookings.all');
//     Route::get('/{request_id}/view', [BookingRequestController::class, "view"])->name('bookings.view');
//     Route::get('/{request_id}/delete', [BookingRequestController::class, "delete"])->name('bookings.delete');
// });

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
