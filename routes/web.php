<?php

use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Route;

Route::prefix('')->group(function () {
    Route::get('/', [PetController::class, 'view']);
});

