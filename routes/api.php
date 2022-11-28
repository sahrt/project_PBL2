<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\API\jurusanController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('addjurusan',[jurusanController::class, 'ProcessAddJurusan']);
Route::post('ubahjurusan',[jurusanController::class, 'updtJurusan']);



Route::prefix('tracer_study')->group(function () {

    Route::post('ubahjurusan',[jurusanController::class, 'updtJurusan']);
    Route::post('ubahjurusan',[jurusanController::class, 'updtJurusan']);
    Route::post('ubahjurusan',[jurusanController::class, 'updtJurusan']);
    Route::post('ubahjurusan',[jurusanController::class, 'updtJurusan']);
    Route::post('ubahjurusan',[jurusanController::class, 'updtJurusan']);
    Route::post('ubahjurusan',[jurusanController::class, 'updtJurusan']);
    Route::post('ubahjurusan',[jurusanController::class, 'updtJurusan']);
    Route::post('ubahjurusan',[jurusanController::class, 'updtJurusan']);
    Route::post('ubahjurusan',[jurusanController::class, 'updtJurusan']);
    Route::post('ubahjurusan',[jurusanController::class, 'updtJurusan']);
    Route::post('ubahjurusan',[jurusanController::class, 'updtJurusan']);

});
