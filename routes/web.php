<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HotelController as UserHotelController;
use App\Http\Controllers\Admin\HotelController as AdminHotelController;
use App\Http\Controllers\PageController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PageController::class, 'welcome'])->name('welcome');
Route::get('/about', [PageController::class, 'about'])->name('about');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
Route::get('user/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.home');

Route::get('/user/hotels/', [UserHotelController::class, 'index'])->name('user.hotels.index');
Route::get('/user/hotels/{id}', [UserHotelController::class, 'show'])->name('user.hotels.show');

Route::get('/admin/hotels/', [AdminHotelController::class, 'index'])->name('admin.hotels.index');
Route::get('/admin/hotels/create', [AdminHotelController::class, 'create'])->name('admin.hotels.create');
Route::get('/admin/hotels/{id}', [AdminHotelController::class, 'show'])->name('admin.hotels.show');
Route::post('/admin/hotels/store', [AdminHotelController::class, 'store'])->name('admin.hotels.store');
Route::get('/admin/hotels/{id}/edit', [AdminHotelController::class, 'edit'])->name('admin.hotels.edit');
Route::put('/admin/hotels/{id}', [AdminHotelController::class, 'update'])->name('admin.hotels.update');
Route::delete('/admin/hotels/{id}', [AdminHotelController::class, 'destroy'])->name('admin.hotels.destroy');