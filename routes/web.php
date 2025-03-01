<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\ProjectController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    Route::resource('news', NewsController::class);
    Route::resource('projects', ProjectController::class);
    Route::get('projects/{project}/gallery/create', [ProjectController::class, 'galleryCreate'])->name('projects.gallery.create');
    Route::post('projects/{project}/gallery', [ProjectController::class, 'galleryStore'])->name('projects.gallery.store');
});

/** Deletes the image. **/
Route::post('/ajax/file-delete', function (Request $request) {
    $modelId    = $request->input('model_id');
    $modelClass = $request->input('model_class');
    $field      = $request->input('field');
    $file       = $request->input('file');

    // If a model is provided, attempt to find and update it.
    if ($modelId && $modelClass && class_exists($modelClass)) {
        $model = app($modelClass)::find($modelId);
        if ($model) {
            if (deleteImages($model->{$field})) {
                $model->{$field} = null;
                $model->save();
                return response()->json([
                    'success' => true,
                    'message' => 'File deleted successfully.'
                ]);
            }
        }
    }

    // Fallback: try to delete the file by itself.
    if (deleteImages($file)) {
        return response()->json([
            'success' => true,
            'message' => 'File deleted successfully.'
        ]);
    }

    return response()->json([
        'success' => false,
        'message' => 'Failed to delete file.'
    ], 400);
})->name('ajax.file-delete');

require __DIR__ . '/auth.php';
