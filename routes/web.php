<?php

use App\Http\Controllers\Backend\AchievementController;
use App\Http\Controllers\Backend\BoardMemberController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\TimelineItemController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\BoardControllerler;
use App\Http\Controllers\Frontend\ContactControllerler;
use App\Http\Controllers\Frontend\GalleryControllerler as FrontGalleryController;
use App\Http\Controllers\Frontend\HistoryController;
use App\Http\Controllers\Frontend\ProjectController as FrontProjectController ;
use App\Http\Controllers\Frontend\NewsEventControllerler;
use App\Http\Controllers\Backend\TranslationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/** Frontend Routes **/
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/about',[AboutController::class,'index'])->name('about');
Route::get('/board',[BoardControllerler::class,'index'])->name('board');
Route::get('/contact',[ContactControllerler::class,'index'])->name('contact');
Route::get('/gallery',[FrontGalleryController::class,'index'])->name('gallery');
Route::get('/history',[HistoryController::class,'index'])->name('history');

Route::group(['prefix'=>'project'],function(){
    Route::get('/',[FrontProjectController::class,'index'])->name('project');
    Route::get('/project/{slug}',[FrontProjectController::class,'show_project'])->name('project.show_project');

});

Route::group(['prefix'=>'news-events'],function(){
    Route::get('/',[NewsEventControllerler::class,'index'])->name('news-events');
    Route::get('/event/{slug}',[NewsEventControllerler::class,'show_event'])->name('news-events.show_event');
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

    /** Gallery routes. **/
    Route::resource('gallery', GalleryController::class);

    /** Board Member, Timeline Item and Achievement routes. **/
    Route::resource('board-members', BoardMemberController::class);
    Route::resource('timeline-items', TimelineItemController::class);
    Route::resource('achievements', AchievementController::class);

    /** Lanaguegs and Translations routes. **/
    Route::get('trans', [TranslationController::class, 'index'])->name('trans.index');
    Route::put('trans/{id}', [TranslationController::class, 'update'])->name('trans.update');

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
