<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Route to get the authenticated user information
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); // Protects the route using Sanctum middleware for authentication

// Group routes related to Task operations
Route::prefix('tasks')->group(function () {
    // Create a new task
    Route::post('/', [TaskController::class, 'store']);
    
    // Retrieve a list of all tasks
    Route::get('/', [TaskController::class, 'index']);
    
    // Retrieve a specific task by ID
    Route::get('/{id}', [TaskController::class, 'show']);
    
    // Update an existing task by ID
    Route::put('/{id}', [TaskController::class, 'update']);
    
    // Delete a task by ID
    Route::delete('/{id}', [TaskController::class, 'destroy']);
});