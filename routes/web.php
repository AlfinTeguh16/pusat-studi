<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MetaDataController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
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
Route::get('/', [MetaDataController::class, 'getMetaData'])->name('getMetaData');
Route::get('/tes', function () {
    return view('inputdosen.master');
})->name('master');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');
// Route::get('/user', function () {
//     return view('user');
// })->name('user');

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::middleware(['auth'])->group(function () {

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


    // Route::get('/importUsers', [UserController::class, 'index'])->name('index');
    // Route::post('/importUsers', [UserController::class, 'importUsers'])->name('import.users');

    Route::get('/metadata', [MetaDataController::class, 'index'])->name('showMetaData');
    Route::get('/metadata/{id}' , [MetadataController::class, 'viewMetadata'])->name('metadata.view');
    // Route::get('/metadata/input', [MetaDataController::class, 'inputMetaData'])->name('inputMetaData');
    // Route::post('/metadata/input', [MetaDataController::class, 'inputMetaData'])->name('createMetaData');

    // Route::get('/metadata/input', [MetaDataController::class, 'storeMetaData'])->name('viewStoreMetaData');
    Route::get('/input', [MetaDataController::class, 'viewStoreMetaData'])->name('viewStoreMetaData');
    Route::post('/input', [MetaDataController::class, 'storeMetaData'])->name('storeMetaData');

    // Route::get('/metadata', [MetaDataController::class, 'showMetaData']);
    // Route::get('/metadata', [MetaDataController::class, 'deleteMetaData']);

    // Route::get('/metadata/edit', [MetaDataController::class, 'viewEditMetaData']);
    Route::get('/metadata/{id}/edit', [MetaDataController::class, 'viewEditMetaData'])->name('viewEditMetaData');
    Route::post('/metadata/{id}/edit', [MetaDataController::class, 'editMetaData'])->name('editMetaData');


    Route::get('/profile', [ProfileController::class, 'index']);
    Route::get('/profile', [ProfileController::class, 'showProfileData']);
    Route::patch('/profile/update', [ProfileController::class, 'updateProfile'])->name('updateProfile');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('userDashboard');
    Route::get('/dashboard/{id}', [DashboardController::class, 'userMetaData'])->name('userMetaData');
});

