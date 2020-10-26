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
Route::get('get_token', [\App\Http\Controllers\API\ApiTokenController::class, 'update']);
Route::get('inquirer/{key}', [\App\Http\Controllers\API\InquirerController::class, 'get']);
Route::post('questions/store', [\App\Http\Controllers\API\QuestionController::class, 'store']);

Route::group(['middleware' => \App\Http\Middleware\ValidateToken::class], function(){

});
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
