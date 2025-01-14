<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProfileController;
use Illuminate\Support\Facades\Route;

/** Frontend Routes **/ 
Route::get('/', function () {
    return view('welcome');
});

/** Admin Routes. **/ 
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    /** Profile routes. **/
    Route::get('/profile', [ProfileController::class, 'viewUsers'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    /** Dashboard routes. **/
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

});

require __DIR__.'/auth.php';
