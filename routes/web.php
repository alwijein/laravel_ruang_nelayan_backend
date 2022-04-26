<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IkanController;
use App\Http\Controllers\KurirController;
use App\Http\Controllers\UserController;
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

Route::middleware(['auth'])->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('home');

    Route::get('/show-nelayan',[UserController::class, 'showNelayan'])->name('show-nelayan');
    Route::post('/show-nelayan', [UserController::class, 'storeNelayan']);

    Route::get('/show-nelayan/{id}/edit',[UserController::class, 'editNelayan'])->name('edit-nelayan');
    Route::put('/show-nelayan/{id}', [UserController::class, 'updateNelayan']);

    Route::get('/show-costumer',[UserController::class, 'showCostumer'])->name('show-costumer');
    Route::post('/show-costumer', [UserController::class, 'storeCostumer']);

    Route::get('/show-costumer/{id}/edit',[UserController::class, 'editCostumer'])->name('edit-costumer');
    Route::put('/show-costumer/{id}', [UserController::class, 'updateCostumer']);

    Route::delete('/show-siswa/{id}', [UserController::class, 'destroy'])->name('delete');

    Route::get('/show-kurir/pengantaran',[KurirController::class, 'showKurir'])->name('show-kurir');
    Route::post('/show-kurir/pengantaran',[KurirController::class, 'store'])->name('show-kurir');

    Route::get('/show-kurir/jasa-pengerjaan',[KurirController::class, 'showJasaPengerjaanIkan'])->name('show-jasa-pengerjaan');
    Route::post('/show-kurir/jasa-pengerjaan',[KurirController::class, 'storeJasaPengerjaanIkan'])->name('show-jasa-pengerjaan');

    Route::get('/show-ikan/jenis',[IkanController::class, 'showJenisIkan'])->name('show-jenis-ikan');
    Route::post('/show-ikan/jenis',[IkanController::class, 'store'])->name('show-jenis-ikan');

    Route::get('/show-ikan/air-tawar',[IkanController::class, 'showIkanAirTawar'])->name('show-air-tawar');
    Route::post('/show-ikan/air-tawar',[IkanController::class, 'storeIkanAirTawar']);

    Route::get('/show-ikan/air-laut',[IkanController::class, 'showIkanAirLaut'])->name('show-air-laut');
    Route::post('/show-ikan/air-laut',[IkanController::class, 'storeIkanAirLaut']);

    Route::post('/logout',[LoginController::class, 'logout'])->name('logout');




});

Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::post('/login', [LoginController::class, 'store']);



