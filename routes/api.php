<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
#*******************************************
use App\Http\Controllers\Api\ManageController;
use App\Http\Controllers\AuthController;
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

// Route::middleware('auth:sanctum')->post('/data_general', function (Request $request) {
//     return $request->user();
// });
#use auth
Route::middleware('auth:sanctum')->post('/data_general', [AuthController::class, 'station']);
# base
Route::post('auth_access_login', [AuthController::class, 'Process_login_api']);
Route::post('auth_access_logout', [AuthController::class, 'Process_logout_api']);
Route::match(['get','post'],'data_gold_silver', [ManageController::class, 'actionStoreGoldSilver']);
// Route::match(['get', 'post'], 'data_general', [ManageController::class, 'actionStoreGeneral']);