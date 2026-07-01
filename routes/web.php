<?php

use App\Http\Controllers\OilChangeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [OilChangeController::class, 'create']);

Route::post('/check', [OilChangeController::class, 'store']);

Route::get('/result/{oilChangeCheck}', [OilChangeController::class, 'show'])->name('result.show');