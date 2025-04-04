<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get("posts", [PostController::class, "index"]);
Route::get("posts/{post}", [PostController::class, "show"]);
Route::get("projects", [ProjectController::class, "index"]);
Route::get("projects/{project}", [ProjectController::class, "show"]);
