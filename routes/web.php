<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::as('front.')->group(function(){

    Route::get('/', [FrontController::class, 'index'])->name('index');
    Route::get('/find-jobs', [FrontController::class, 'find_jobs'])->name('find_jobs');
    Route::get('/profile', [FrontController::class, 'profile'])->name('profile')->middleware('auth');

    Route::middleware(['auth', 'checkUserType'])->group(function(){
        Route::get('/create-job', [FrontController::class, 'create_job'])->name('create_job');
        Route::get('/my_projects', [FrontController::class, 'my_projects'])->name('my_projects');
    });
    Route::get('/project/{slug}', [FrontController::class, 'project_details'])->name('project_details')->middleware('auth');
    Route::get('/message/user/{id}/{name}/{project_id}', [FrontController::class, 'message'])->name('message')->middleware('auth');
});

Route::prefix('api')->group(function(){
    Route::get('/get_categories', [ApiController::class, 'get_categories']);
    Route::get('/get_tags', [ApiController::class, 'get_tags']);
    Route::get('/user_data_profile', [ApiController::class, 'user_data_profile']);
    Route::post('/update-profile', [ApiController::class, 'update_profile']);
    Route::post('/create-job', [ApiController::class, 'create_job']);
    Route::get('find-job', [ApiController::class, 'find_job']);
    Route::post('applyProject/{id}', [ApiController::class, 'applyProject']);

    Route::post('notifications', [NotificationController::class,'index']);
    Route::post('markAsRead', [NotificationController::class,'markAsRead']);

    Route::post('AcceptOffer/{offer}', [ApiController::class,'AcceptOffer']);
    Route::post('RejectOffer/{offer}', [ApiController::class,'RejectOffer']);
    Route::post('send_message', [ApiController::class,'send_message']);
    Route::get('get_messages', [ApiController::class,'get_messages']);
});

//Route::view('test','welcome');

require __DIR__.'/auth.php';
