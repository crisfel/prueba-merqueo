<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Teams
Route::post('v1/team/store', App\Http\Controllers\Teams\StoreController::class);

//Players
Route::post('v1/player/store', App\Http\Controllers\Players\StoreController::class);

//Tournaments
Route::post('v1/tournament/simulate', App\Http\Controllers\Tournaments\SimulateController::class);
