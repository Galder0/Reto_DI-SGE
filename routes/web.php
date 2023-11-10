<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\IncidenceController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resources([
        'comentarios' => ComentarioController::class,
    ]);
    Route::resources([
        'departments' => DepartmentController::class,
    ]);
    Route::resources([
        'categories' => CategoryController::class,
    ]);
    Route::resources([
        'incidences' => IncidenceController::class,
    ]);
    Route::resources([
        'priorities' => PriorityController::class,
    ]);
    Route::resources([
        'statuses' => StatusController::class,
    ]);
    Route::resources([
        'home' => HomeController::class,
    ]);

    
});

Route::controller(IncidenceController::class)->group(function () {
    Route::get('/incidences', 'index')->name('incidences.index');
    //Route::get('/incidences/{incidence}', 'show')->name('incidences.show');
})->withoutMiddleware([Auth::class]);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 