<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

//Teams
Route::get('/show-teams', App\Http\Controllers\Teams\ShowAllController::class)->name('teams.show-all');
Route::get('/edit-team/{id}', App\Http\Controllers\Teams\EditController::class)->name('teams.edit');
Route::get('/create-team', App\Http\Controllers\Teams\CreateController::class)->name('teams.create');


//Players
Route::get('/show-players/{id}', App\Http\Controllers\Players\ShowController::class)->name('players.show');
Route::get('/create-player/{id}', App\Http\Controllers\Players\CreateController::class)->name('players.create');

//Tournaments
Route::get('/show-tournaments', App\Http\Controllers\Tournaments\ShowController::class)->name('tournaments.show');
Route::get('/create-tournaments', App\Http\Controllers\Tournaments\CreateController::class)->name('tournaments.create');



