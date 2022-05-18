<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\StudentController;

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

// Auth Route
Route::post('auth', [UserController::class, 'auth']);

// Student Route
Route::post('pay', [UserController::class, 'pay']);
Route::post('trShow', [UserController::class, 'trShow']);

// Route::post('register', [UserController::class, 'register']); 

// Officer Route


// Master Route
Route::put('editpetugas/{id}', [MasterController::class, 'editPetugas']);
Route::post('addPetugas', [MasterController::class, 'addPetugas']);
Route::delete('deletePetugas/{id}', [MasterController::class, 'deletePetugas']);
Route::post('getid/{id}', [MasterController::class , 'getById']);
Route::get('petugas', [MasterController::class, 'showPetugas']);
