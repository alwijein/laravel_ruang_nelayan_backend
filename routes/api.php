<?php

use App\Http\Controllers\API\HasilTangkapanController;
use App\Http\Controllers\API\UserController;
use App\Models\HasilTangkapan;
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


Route::get('hasil-tangkapan',[HasilTangkapanController::class, 'all']);

Route::post('register', [UserController::class, 'register']);

Route::post('login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('user',[UserController::class, 'fetch']);
    Route::post('user', [UserController::class, 'updateProfile']);
    Route::get('logout', [UserController::class, 'logout']);
});

