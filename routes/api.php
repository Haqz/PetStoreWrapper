<?php

use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Route;

Route::middleware(['api'])->group(function () {
    Route::prefix('pet')->as('pet.')->group(function () {
        Route::controller(PetController::class)->group(function () {
            Route::post('/store', 'store');
            Route::get('/{id}', 'show');
            Route::put('/{id}', 'show');
            Route::delete('/{id}', 'show');
            Route::get('/', 'index');
        });
    });
});

