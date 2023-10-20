<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartmentController;
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

// Route::middleware(['auth'])->group(function () {
    Route::resources([
        'posts' => PostController::class,
    ]);
    Route::resources([
        'comentarios' => ComentarioController::class,
    ]);
    Route::resources([
        'departments' => DepartmentController::class,
    ]);
    Route::resources([
        'categories' => CategoryController::class,
    ]);
// });

// Route::controller(PostController::class)->group(function () {
//     Route::get('/posts', 'index')->name('posts.index');
//     Route::get('/posts/{post}', 'show')->name('posts.show');
// })->withoutMiddleware([Auth::class]);

// Route::controller(CategorieController::class)->group(function () {
//     Route::get('/categories', 'index')->name('categories.index');
//     Route::get('/categories/{categorie}', 'show')->name('categories.show');
// })->withoutMiddleware([Auth::class]);

// Route::controller(DepartmentController::class)->group(function () {
//     Route::get('/departments', 'index')->name('departments.index');

// })->withoutMiddleware([Auth::class]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 