<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MetaDataController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GuestController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/importUsers', [UserController::class, 'index'])->name('index');
Route::post('/importUsers', [UserController::class, 'importUsers'])->name('import.users');




Route::get('/login', function () {
    return view ('auth.login');
})->name('login');


Route::post('/login', [LoginController::class, 'login'])->name('postLogin');
Route::middleware(['auth'])->group(function () {

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//Profile
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::get('/profile', [ProfileController::class, 'showProfileData']);
    Route::patch('/profile/update', [ProfileController::class, 'updateProfile'])->name('updateProfile');

    // User Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('userDashboard');
    Route::get('/dashboard/{id}', [DashboardController::class, 'userMetaData'])->name('userMetaData');
    Route::get('/dashboard/detail/{id}', [DashboardController::class, 'detailDashboardEvent'])->name('detailDashboardEvent');
    Route::get('/dashboard/detail/{id}', [DashboardController::class, 'detailDashboardProduct'])->name('detailDashboardProduct');

// Meta Data
    Route::get('/input', [MetaDataController::class, 'viewStoreMetaData'])->name('viewStoreMetaData');
    Route::post('/input/metadata', [MetaDataController::class, 'storeMetaData'])->name('metaData.store');
    Route::get('/metadata', [MetaDataController::class, 'index'])->name('showMetaData');
    Route::get('/metadata', [MetaDataController::class, 'searchMetaData'])->name('searchMetaData');
    Route::get('/metadata/{id}' , [MetadataController::class, 'viewMetaData'])->name('metadata.view');
    Route::get('/metadata/{id}/edit', [MetaDataController::class, 'viewEditMetaData'])->name('viewEditMetaData');
    Route::put('/metadata/{id}/edit', [MetaDataController::class, 'editMetaData'])->name('editMetaData');
    Route::delete('/metadata/{id}', [MetaDataController::class, 'destroy'])->name('deleteMetaData');

// Event
    Route::get('/event', [EventController::class, 'index'])->name('viewEvent');
    Route::get('/event', [EventController::class, 'searchEvent'])->name('searchEvent');
    Route::get('/event/detail/{id}', [EventController::class, 'detailEvent'])->name('detailEvent');
    Route::get('/event/input', [EventController::class, 'viewStoreEvent'])->name('viewStoreEvent');
    Route::post('/event/input', [EventController::class, 'create'])->name('createEvent');
    Route::get('/event/{id}/edit', [EventController::class, 'viewUpdateEvent'])->name('viewUpdateEvent');
    Route::put('/event/{id}', [EventController::class, 'update'])->name('editEvent.update');
    Route::delete('/event/{id}', [EventController::class, 'destroy'])->name('deleteEvent');

    // Product
    Route::get('/product', [ProductController::class, 'index'])->name('viewProduct');
    Route::get('/product', [ProductController::class, 'searchProduct'])->name('searchProduct');
    Route::get('/product/detail/{id}', [ProductController::class, 'detailProduct'])->name('detailProduct');
    Route::get('/product/input', [ProductController::class, 'viewStoreProduct'])->name('viewStoreProduct');
    Route::post('/product/input', [ProductController::class, 'create'])->name('createProduct');
    Route::get('/product/{id}/edit', [ProductController::class, 'viewUpdateProduct'])->name('viewUpdateProduct');
    Route::put('/product/{id}', [ProductController::class, 'update'])->name('editProduct.update');
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('deleteProduct');

});

Route::view('/admin', 'admin.admin');

Route::get('/', [GuestController::class, 'getMetaData'])->name('getMetaData');

Route::get('/meta', [GuestController::class, 'showMetaData'])->name('showMetaData');
Route::get('/meta/detail/{id}', [GuestController::class, 'viewMetaData'])->name('viewMetaData');

Route::get('/events', [GuestController::class, 'showGuestEvent'])->name('showGuestEvent');
Route::get('/events/detail/{id}', [GuestController::class, 'viewGuestEvent'])->name('viewGuestEvent');

Route::get('/products', [GuestController::class, 'showGuestProduct'])->name('showGuestProduct');
Route::get('/products/detail/{id}', [GuestController::class, 'viewGuestProduct'])->name('viewGuestProduct');



