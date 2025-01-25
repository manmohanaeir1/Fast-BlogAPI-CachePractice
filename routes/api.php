<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ArticleController;

use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/articles', [ArticleController::class, 'index']);