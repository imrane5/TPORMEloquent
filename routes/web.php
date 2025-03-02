<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StagiaireController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('stagiaires', StagiaireController::class);

// Custom routes for additional actions
Route::post('stagiaires/search', [StagiaireController::class, 'search'])->name('stagiaires.search');
Route::delete('stagiaires/deleteAll', [StagiaireController::class, 'deleteAll'])->name('stagiaires.deleteAll');