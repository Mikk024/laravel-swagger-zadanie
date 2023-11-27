<?php

use App\Http\Controllers\Pet\PetController;
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


Route::prefix('pets')->group(function () {
    Route::get('/', [PetController::class, 'show'])->name('pet-show');
    Route::get('/create', [PetController::class, 'create'])->name('pet-create');
    Route::post('/store', [PetController::class, 'store'])->name('pet-store');
    Route::delete('/delete', [PetController::class, 'destroy'])->name('pet-destroy');
    Route::get('/{id}/edit', [PetController::class, 'edit'])->name('pet-edit');
    Route::put('/update', [PetController::class, 'update'])->name('pet-update');
});

