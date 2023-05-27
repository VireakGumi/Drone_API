<?php

use App\Http\Controllers\MapController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DroneController;
use App\Http\Controllers\InstructionController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PlanController;
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
    // drone--------------------
    Route::get('/drones',[DroneController::class,'index']);
    Route::get('/drones/{id}',[DroneController::class,'show']);
    Route::delete('/drones/{id}',[DroneController::class,'destroy']);
    Route::get('/drones/{id}/location',[DroneController::class,'showLocation']);
    Route::post('/drones',[DroneController::class,'store']);
    Route::put('/drones/{id}',[DroneController::class,'update']);
    Route::put('/dronesInstruct/{id}',[DroneController::class,'updateInstruct']);

    // plan--------------------
    Route::post('/plans/plan', [PlanController::class, 'store']);
    Route::get('/plans/{planName}', [PlanController::class, 'show']);

    // map -----------------------
    Route::get('/maps', [MapController::class, 'index']);
    Route::post('/maps', [MapController::class, 'store']);
    Route::get('/maps/{provinceName}/{farmId}', [MapController::class, 'show']);
    Route::delete('/maps/{provinceName}/{farmId}', [MapController::class, 'destroy']);
    // instruction -----------------
    Route::get('/instructions', [InstructionController::class, 'index']);
    Route::get('/instructions/{drone_id}', [InstructionController::class, 'show']);

    // location----------------------
    Route::post('/locations',[LocationController::class,'store']);
});

Route::post('/register',[UserController::class,'register']);
Route::post('/login',[UserController::class,'login']);






