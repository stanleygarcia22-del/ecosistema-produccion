<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MenuItemController;

// Endpoint para filtrado por categoría (debe definirse antes del recurso para evitar conflictos)
Route::get('menu-items/category/{category}', [MenuItemController::class, 'getByCategory']);

// Endpoints CRUD principales
Route::apiResource('menu-items', MenuItemController::class);