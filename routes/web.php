<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\TaxiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\BookController;
use App\Models\Book;
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

Route::get('send', function () {
    $mile = Book::first();
    return view('website.book_send', compact('mile'));
});


Route::get('/', [WebsiteController::class, 'index'])->name('index');
Route::get('booking', [WebsiteController::class, 'booking'])->name('booking');
Route::post('mileStore', [BookController::class, 'mileStore'])->name('mileStore');
Route::post('cityStore', [BookController::class, 'cityStore'])->name('cityStore');



Route::get('pay_online', [WebsiteController::class, 'pay_online'])->name('pay_online');
Route::get('detail_booking/{id}/{email}', [WebsiteController::class, 'detail_booking'])->name('detail_booking');
Route::get('detail_book/{id}/{email}', [WebsiteController::class, 'detail_book'])->name('detail_book');
Route::get('details_booking/{id}/{email}', [WebsiteController::class, 'details_booking'])->name('details_booking');
Route::get('cancel/{id}/{email}', [WebsiteController::class, 'cancel'])->name('cancel');

// Route::post('webhook', [BookController::class, 'webhook'])->name('webhook');












Route::prefix('admin')->middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'adminLogin'])->name('adminLogin');
});


Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', [UserController::class, 'dashboard'])->name('dashboard');

    // Begin Route Users
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('users/{id}/active', [UserController::class, 'show'])->name('users.show');
    // End Route Users

    // Begin Route Taxis
    Route::get('taxis', [TaxiController::class, 'index'])->name('taxis.index');
    Route::get('taxis/create', [TaxiController::class, 'create'])->name('taxis.create');
    Route::post('taxis', [TaxiController::class, 'store'])->name('taxis.store');
    // Route::get('taxis/{id}/edit', [TaxiController::class, 'edit'])->name('taxis.edit');
    // Route::post('taxis/{id}', [TaxiController::class, 'update'])->name('taxis.update');
    Route::get('taxis/{id}', [TaxiController::class, 'destroy'])->name('taxis.destroy');
    Route::get('taxis/{id}/active', [TaxiController::class, 'show'])->name('taxis.show');
    // End Route Taxis

    // Begin Route Cities
    Route::get('cities', [CityController::class, 'index'])->name('cities.index');
    Route::get('cities/create', [CityController::class, 'create'])->name('cities.create');
    Route::post('cities', [CityController::class, 'store'])->name('cities.store');
    Route::get('cities/{id}/edit', [CityController::class, 'edit'])->name('cities.edit');
    Route::post('cities/{id}', [CityController::class, 'update'])->name('cities.update');
    Route::get('cities/{id}', [CityController::class, 'destroy'])->name('cities.destroy');
    Route::get('cities/{id}/active', [CityController::class, 'show'])->name('cities.show');
    // End Route Cities


});
