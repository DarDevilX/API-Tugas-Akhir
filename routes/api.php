<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MasterController;

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

// Post Route
Route::post('addPetugas', [MasterController::class, 'addPetugas']);
Route::post('login', [UserController::class, 'auth']);
Route::post('register', [UserController::class, 'register']);

// Delete Route
Route::delete('deletePetugas/{id}', [MasterController::class, 'deletePetugas']);
