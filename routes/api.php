<?php

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

// Unsecured routes
Route::get('get_token', [\App\Http\Controllers\API\ApiTokenController::class, 'update']);
Route::get('inquirer/get/{key}', [\App\Http\Controllers\API\InquirerController::class, 'get']);
Route::post('questions/store', [\App\Http\Controllers\API\QuestionController::class, 'store']);


// Secured routes
Route::group(['middleware' => \App\Http\Middleware\ValidateToken::class], function(){
    Route::apiResource('inquirer', \App\Http\Controllers\API\InquirerController::class)->only(['index','store']);
    Route::get('diagram_data', [\App\Http\Controllers\API\InquirerController::class, 'data']);
});
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
