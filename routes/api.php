<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/v1/person', App\Http\Controllers\Api\v1\PersonController::class);

// Route::apiResource('/person',PersonController::class)
// ->only(['show', 'destroy', 'update', 'store']);

// Route::apiResource('/people',PersonController::class)
// ->only('index');

Route::apiResource('/v2/person', App\Http\Controllers\Api\v2\PersonController::class)
->only('show');

Route::get('/persons',[App\Http\Controllers\Api\v1\PersonController::class, 'somePersons']);

