<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\AdminController;
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

// Route::get('/importUsers', [UserController::class, 'index'])->name('index');
// Route::post('/importUsers', [UserController::class, 'importUsers'])->name('import.users');


Route::get('/error', function () {
    return view('errors');
})->name('customError');


Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('postLogin');

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    // Admin
    Route::middleware(['checkAdmin'])->group(function () {
        Route::get('/admin', [AdminController::class, 'viewAdmin'])->name('viewAdmin');
        Route::post('/galery', [AdminController::class, 'store'])->name('galery.store');
        Route::put('/galery/{id}', [AdminController::class, 'update'])->name('galery.update');
        Route::delete('/galery/{id}', [AdminController::class, 'destroy'])->name('galery.destroy');
    });

    // Profile
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::get('/profile', [ProfileController::class, 'showProfileData']);
    Route::patch('/profile/update', [ProfileController::class, 'updateProfile'])->name('updateProfile');

    // User Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('userDashboard');
    Route::get('/dashboard/{id}', [DashboardController::class, 'userMetaData'])->name('userMetaData');
    // Route::get('/dashboard/detail/{id}', [DashboardController::class, 'detailDashboardEvent'])->name('detailDashboardEvent');
    // Route::get('/dashboard/detail/{id}', [DashboardController::class, 'detailDashboardProduct'])->name('detailDashboardProduct');

    // Meta Data
    Route::get('/input', [MetaDataController::class, 'viewStoreMetaData'])->name('viewStoreMetaData');
    Route::post('/input/metadata', [MetaDataController::class, 'storeMetaData'])->name('metaData.store');
    Route::get('/metadata/search', [MetaDataController::class, 'searchMetaData'])->name('searchMetaData');
    Route::get('/metadata', [MetadataController::class, 'listMetaData'])->name('metadata.list');
    Route::get('/metadata/{id}', [MetadataController::class, 'showMetaData'])->name('metadata.show');
    Route::get('/metadata/detail/{id}', [MetadataController::class, 'detailMetaData'])->name('metadata.detail');
    Route::get('/metadata/edit/{id}', [MetaDataController::class, 'editMetaData'])->name('editMetaData');
    Route::post('/metadata/edit/{id}', [MetaDataController::class, 'updateMetaData'])->name('metaData.update');
    Route::delete('/metadata/{id}', [MetaDataController::class, 'destroy'])->name('deleteMetaData');

    // Product
    Route::get('/product/{id}', [ProductController::class, 'showProduct'])->name('product.show');
    Route::get('/product/search', [ProductController::class, 'searchProducts'])->name('searchProducts');
    Route::get('/product', [ProductController::class, 'listProduct'])->name('products.list');
    Route::get('/product/detail/{id}', [ProductController::class, 'detailProduct'])->name('detailProduct');
    Route::get('/products/input', [ProductController::class, 'viewStoreProduct'])->name('viewStoreProduct');
    Route::post('/product/input', [ProductController::class, 'storeProducts'])->name('product.store');
    Route::get('/product/edit/{id}', [ProductController::class, 'editProducts'])->name('editProduct');
    Route::post('/product/edit/{id}', [ProductController::class, 'updateProducts'])->name('product.update');
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('deleteProduct');

    // Event
    Route::get('/event', [EventController::class, 'listEvent'])->name('event.list');
    Route::get('/event/search', [EventController::class, 'searchEvent'])->name('searchEvent');
    Route::get('/event/detail/{id}', [EventController::class, 'detailEvent'])->name('detailEvent');
    Route::get('/event/input', [EventController::class, 'viewStoreEvent'])->name('viewStoreEvent');
    Route::get('/event/{id}', [EventController::class, 'showEvent'])->name('event.show');
    Route::post('/event/input', [EventController::class, 'storeEvent'])->name('event.store');
    Route::get('/event/edit/{id}', [EventController::class, 'editEvents'])->name('event.edit');
    Route::post('/event/edit/{id}', [EventController::class, 'updateEvent'])->name('event.update');
    Route::delete('/event/{id}', [EventController::class, 'destroy'])->name('deleteEvent');
});


// Route::view('/admin', 'admin.admin');

Route::get('/', [GuestController::class, 'getMetaData'])->name('getMetaData');

Route::get('/meta', [GuestController::class, 'showMetaData'])->name('showMetaData');
Route::get('/meta/detail/{id}', [GuestController::class, 'viewMetaData'])->name('viewMetaData');

Route::get('/events', [GuestController::class, 'showGuestEvent'])->name('showGuestEvent');
Route::get('/events/detail/{id}', [GuestController::class, 'viewGuestEvent'])->name('viewGuestEvent');

Route::get('/products', [GuestController::class, 'showGuestProduct'])->name('showGuestProduct');
Route::get('/products/detail/{id}', [GuestController::class, 'viewGuestProduct'])->name('viewGuestProduct');



