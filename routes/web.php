<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
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

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [LoginController::class, 'login']);
Route::middleware(['auth'])->group(function () {

    Route::post('/logout', [LoginController::class, 'logout']);

});


Route::get('/log', function () {
    return view('auth.login');
});
Route::get('/pusat', function () {
    return view('home.pusatstudi');
});

