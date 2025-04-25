<?php
use App\Http\Controllers\CoteController;
use Illuminate\Support\Facades\Route;

Route::post('/cotes', [CoteController::class, 'store']);       // Ajouter une cote
Route::get('/cotes', [CoteController::class, 'index']);         // Afficher le regroupements de cotes par étudiant