<?php

use App\Http\Controllers\DroneController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserController;
use App\Models\Drone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout',[UserController::class,'logout']);
    
});

Route::post('/register',[UserController::class,'register']);
Route::post('/login',[UserController::class,'login']);


Route::get('/drones',[DroneController::class,'index']);
Route::get('/drones/{id}',[DroneController::class,'show']);
Route::get('/drones/{id}/location',[DroneController::class,'showLocation']);
Route::post('/drones',[DroneController::class,'store']);
Route::post('/drones/{id}',[DroneController::class,'update']);

Route::post('/locations',[LocationController::class,'store']);
