<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get("posts", [PostController::class, "index"]);
Route::get("posts/{post}", [PostController::class, "show"]);
Route::get("projects", [ProjectController::class, "index"]);
Route::get("projects/{project}", [ProjectController::class, "show"]);
Route::get("reviews", [ReviewController::class, "index"]);
Route::get("reviews/{review}", [ReviewController::class, "show"]);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function () {
        $user = auth()->user;
        if (!$user) {
            return response()->json(['error' => 'Utente non autenticato'], 401);
        }
        return response()->json($user);
    });
    Route::post('/register', [AuthController::class, 'register']);
});
