<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('master');
});
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [LoginController::class, 'login']);
Route::middleware(['auth'])->group(function () {

    Route::post('/logout', [LoginController::class, 'logout']);

    Route::get('/', [MetaDataController::class, 'getMetaData'])->name('getMetaData');

    Route::get('/metadata', [MetaDataController::class, 'index']);
    Route::get('/metadata/input', [MetaDataController::class, 'viewInputMetaData']);
    Route::post('/metadata/input', [MetaDataController::class, 'inputMetaData'])->name('createMetaData');

    Route::get('/metadata', [MetaDataController::class, 'showMetaData']);
    Route::get('/metadata', [MetaDataController::class, 'deleteMetaData']);

    Route::get('/metadata/edit', [MetaDataController::class, 'viewEditMetaData']);
    Route::post('/metadata/edit', [MetaDataController::class, 'editMetaData']);


    Route::get('/profile', [ProfileController::class, 'index']);
    Route::get('/profile', [ProfileController::class, 'updateProfile']);

});


Route::get('/pusat', function () {
    return view('home.pusatstudi');
});

Route::get('/inputmeta', function () {
    return view('inputdosen.inputmetadata');
});

Route::get('/profile', function () {
    return view('inputdosen.profiledosen');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [LoginController::class, 'login']);
