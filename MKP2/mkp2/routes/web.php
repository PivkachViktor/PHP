<?php

use App\Http\Controllers\ManufacturerController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');

});
Route::get('/manufacturers', [ManufacturerController::class, 'index']) -> name('index');
Route::delete('/manufacturers/{id}', [ManufacturerController::class, 'destroy']) -> name('destroy');
Route::get('/manufacturers/{id}/delete',[ManufacturerController::class,'showDeleteConfirmation' ] )-> name('confirm-delete');
