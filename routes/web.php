<?php

use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;


Route::any('/surveys/search', [SurveyController::class, "search"])->name('surveys.search');
Route::get('/surveys', [SurveyController::class, "index"])->name('surveys.index');
Route::get('/surveys/create', [SurveyController::class, "create"])->name('surveys.create');
Route::post('/surveys', [SurveyController::class, "store"])->name('surveys.store');
Route::get('/surveys/{id}', [SurveyController::class, "show"])->name('surveys.show');
Route::get('/surveys/edit/{id}', [SurveyController::class, "edit"])->name('surveys.edit');
Route::delete('/surveys/{id}', [SurveyController::class, "destroy"])->name('surveys.destroy');
Route::put('/surveys/{id}', [SurveyController::class, "update"])->name('surveys.update');

