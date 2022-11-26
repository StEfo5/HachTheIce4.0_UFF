<?php

use App\Http\Controllers\CheckpointController;
use App\Models\Checkpoint;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckpointsController;
use App\Http\Controllers\NotificationController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{PathMatch}', function(){return view('welcome');})->where('pathMatch', ".*");


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::prefix('/profile')->group(function(){
//     Route::controller(ProfileController::class)->group(function(){
//         Route::get('/', 'index');
//         Route::post('/update', 'update');
//     });
// });

// Route::controller(CheckpointsController::class)->group(function(){
//     Route::prefix('/checkpoints')->group(function(){

//         Route::get('/', 'index');
//         Route::post('/create', 'create');
//         Route::prefix('/{checkpoint_id}')->group(function(){
            
//             Route::get('/', 'checkpoint')->name('checkpoint');
//             Route::post('/criteria/create', 'criteria_create');
//             Route::get('/criteria');
//             Route::post('/criteria/{criteria_id}', 'option_create');
//             Route::prefix('/team/{team_id}')->group(function(){
//                 Route::get('/', 'team');
//                 Route::post('/expertise', 'expertise');
//             });
//             Route::get('/end', 'end');
//         });
//     });
// });

// Route::controller(NotificationController::class)->group(function() {
//     Route::prefix('/checkpoints/{checkpoint_id}/notification')->group(function(){
//         Route::get('/', 'all');
//         Route::get('/queque', 'queque');
//     });
// });

// Route::controller(WorkflowController::class)->group(function(){
//     Route::prefix('/workflow')->group(function(){
//         Route::get('/', 'index');
//     });
// });