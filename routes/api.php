<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\DataTransferController;

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

Route::get('/test-import', [TestController::class, 'testImport']);
Route::get('/test-array', [TestController::class, 'testArray']);
Route::get('/test-collection', [TestController::class, 'testCollection']);

Route::post('/data-transfer', [DataTransferController::class, 'applicantImport']);

Route::get('/transfer-posting', [DataTransferController::class, 'transferPosting']);
