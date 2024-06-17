<?php

use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\ProdutosController;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/produtos', [ProdutosController::class, 'store']);
Route::get("/produtos", [ProdutosController::class, 'index']);
Route::get("/produtos/{produto}", [ProdutosController::class, 'show']);
Route::put("/produtos/{produto}", [ProdutosController::class, 'update']);
Route::delete("/produtos/{produto}", [ProdutosController::class, 'destroy']);
Route::post("/categorias", [CategoriaController::class, 'store']);
Route::get("/categorias", [CategoriaController::class, 'index']);
Route::get("/categorias/{categoria}", [CategoriaController::class, 'show']);
Route::put("/categorias/{categoria}", [CategoriaController::class, 'update']);
Route::delete("/categorias/{categoria}", [CategoriaController::class, 'destroy']);