<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/projects/create', [ProjectController::class, 'create'])
        ->name('projects.create');
    Route::post('/projects/', [ProjectController::class, 'store'])
        ->name('projects.store');
    Route::get('/projects/{user}', [ProjectController::class, 'show'])
        ->name('projects.show');
    Route::get('/projects/{user}/edit', [ProjectController::class, 'edit'])
        ->name('projects.edit');
    Route::put('/projects/{user}', [ProjectController::class, 'update'])
        ->name('projects.update');
    Route::delete('/projects/{user}', [ProjectController::class, 'destroy'])
        ->name('projects.destroy');
});

//Route::resource('projects', ProjectController::class);

Route::get('/projects', [ProjectController::class, 'index'])
    ->name('projects.index');




require __DIR__.'/auth.php';
