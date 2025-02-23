<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\ProfileController;
use Illuminate\Support\Facades\Route;

/** Frontend Routes **/ 
Route::get('/', function () {
    return view('welcome');
});

/** Admin Routes. **/ 
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    /** Profile routes. **/
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    /** Dashboard routes. **/
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    /** Event, project and News routes. **/
    Route::resource('events', EventController::class);

    
});

require __DIR__.'/auth.php';
