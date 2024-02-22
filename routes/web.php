<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MetaDataController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('master');
});
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
// Route::get('/user', function () {
//     return view('user');
// })->name('user');

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::middleware(['auth'])->group(function () {

    Route::post('/logout', [LoginController::class, 'logout']);


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

    Route::get('/metadata/edit', [MetaDataController::class, 'viewEditMetaData']);
    Route::post('/metadata/edit', [MetaDataController::class, 'editMetaData']);


    Route::get('/profile', [ProfileController::class, 'index']);
    Route::get('/profile', [ProfileController::class, 'updateProfile']);

});


Route::get('/log', function () {
    return view('auth.login');
});
Route::get('/pusat', function () {
    return view('home.pusatstudi');
});

