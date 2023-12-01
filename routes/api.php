<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\DepartmentController;
use App\Http\Controllers\API\AuthController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'department' => DepartmentController::class,
]);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::resource('departments', DepartmentController::class)->except(['index', 'show']); // Exclude 'index' and 'show' from the resource
    Route::post('departments', [DepartmentController::class, 'store']); // Add the route for creating a department
});

Route::resource('departments', DepartmentController::class)->only(['index', 'show'])->withoutMiddleware(['auth:sanctum']);