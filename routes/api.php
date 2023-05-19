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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('signUp', App\Http\Controllers\API\UserAPIController::class);
Route::post('/signUp', [App\Http\Controllers\API\UserAPIController::class, 'store']);

Route::group(['middleware' => ['auth:api']], function () {
    // Route::post('/signIn', [App\Http\Controllers\API\UserAPIController::class, 'store']);

    Route::resource('users', App\Http\Controllers\API\UserAPIController::class);
});






















