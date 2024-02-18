<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PropertyController;
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

Route::get("/properties/{Property}",[PropertyController::class,"index"]);
Route::get("/properties",[PropertyController::class,"getProperties"]);
Route::delete("/properties/delete/{Property}",[PropertyController::class,"delete"]);
Route::post("/properties/create",[PropertyController::class,"create"]);
Route::patch("/properties/update/{Property}",[PropertyController::class,"update"]);
