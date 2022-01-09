<?php

// It takes and uses the route, and from the controllers it takes the page controller
// It takes the hotel controller from the admin and the hotel controller from the user
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

// This takes to the 'welcome' and 'about' page.
Route::get('/', [PageController::class, 'welcome'])->name('welcome');
Route::get('/about', [PageController::class, 'about'])->name('about');

// This authenticates the routes
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
Route::get('user/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.home');

// This takes and routes the functions for the ordinary user.
Route::get('/user/hotels/', [UserHotelController::class, 'index'])->name('user.hotels.index');
Route::get('/user/hotels/{id}', [UserHotelController::class, 'show'])->name('user.hotels.show');

// This takes and routes the functions for the administrator user.
Route::get('/admin/hotels/', [AdminHotelController::class, 'index'])->name('admin.hotels.index');
Route::get('/admin/hotels/create', [AdminHotelController::class, 'create'])->name('admin.hotels.create');
Route::get('/admin/hotels/{id}', [AdminHotelController::class, 'show'])->name('admin.hotels.show');
// For example this uses the store function from the admin controller and the name for that route is admin.hotels.store
Route::post('/admin/hotels/store', [AdminHotelController::class, 'store'])->name('admin.hotels.store');
Route::get('/admin/hotels/{id}/edit', [AdminHotelController::class, 'edit'])->name('admin.hotels.edit');
Route::put('/admin/hotels/{id}', [AdminHotelController::class, 'update'])->name('admin.hotels.update');
Route::delete('/admin/hotels/{id}', [AdminHotelController::class, 'destroy'])->name('admin.hotels.destroy');