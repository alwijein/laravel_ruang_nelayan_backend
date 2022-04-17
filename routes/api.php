<?php

use App\Http\Controllers\API\HasilTangkapanController;
use App\Http\Controllers\API\IkanAirTawarController;
use App\Http\Controllers\API\JasaPengantaranController;
use App\Http\Controllers\API\JenisIkanController;
use App\Http\Controllers\API\JenisPengerjaanIkanController;
use App\Http\Controllers\API\LaporanHarianController;
use App\Http\Controllers\API\PaymentController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\UserController;
use App\Models\HasilTangkapan;
use App\Models\IkanAirTawar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::post('register', [UserController::class, 'register']);

Route::post('login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('user',[UserController::class, 'fetch']);
    Route::get('get-all',[UserController::class, 'getAll']);
    Route::post('user', [UserController::class, 'updateProfile']);
    Route::get('logout', [UserController::class, 'logout']);
    Route::get('hasil-tangkapan',[HasilTangkapanController::class, 'all']);
    Route::post('hasil-tangkapan/tambah-ikan',[HasilTangkapanController::class, 'tambahIkan']);
    Route::post('hasil-tangkapan/update-ikan',[HasilTangkapanController::class, 'updateIkan']);
    Route::get('jenis-ikan',[JenisIkanController::class, 'getAll']);
    Route::get('jenis-pengerjaan-ikan',[JenisPengerjaanIkanController::class, 'getAll']);
    Route::post('ikan-air-tawar/tambah', [IkanAirTawarController::class, 'create']);
    Route::get('ikan-air-tawar/lihat', [IkanAirTawarController::class, 'getAll']);

    Route::get('jasa-pengantaran', [JasaPengantaranController::class, 'getAll']);



    Route::get('transaction', [TransactionController::class, 'all']);
    Route::post('checkout', [TransactionController::class, 'checkout']);
    Route::post('getToken', [PaymentController::class, 'getToken']);

    Route::post('confirm-status', [TransactionController::class, 'confirmStatus']);

    Route::get('laporan-harian', [LaporanHarianController::class, 'getAll']);
    Route::post('laporan-harian', [LaporanHarianController::class, 'inputLaporan']);


});

