<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckpointsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\WorkflowController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(CheckpointsController::class)->group(function(){
    Route::prefix('/checkpoints')->group(function(){

        Route::get('/', 'index');
        Route::post('/create', 'create');
        Route::prefix('/{checkpoint_id}')->group(function(){
            
            Route::get('/', 'checkpoint')->name('checkpoint');
            Route::post('/criteria/create', 'criteria_create');
            Route::get('/criteria');
            Route::get('/criteria/get', 'get_crit_opt');
            Route::post('/criteria/{criteria_id}', 'option_create');
            Route::prefix('/team/{team_id}')->group(function(){
                Route::get('/', 'team');
                Route::post('/expertise', 'expertise');
            });
            Route::get('/end', 'end');
        });
    });
});

Route::controller(NotificationController::class)->group(function() {
    Route::prefix('/checkpoints/{checkpoint_id}/notification')->group(function(){
        Route::get('/', 'all');
        Route::get('/queque', 'queque');
    });
});

Route::controller(WorkflowController::class)->group(function(){
    Route::prefix('/workflow')->group(function(){
        Route::get('/', 'index');
    });
});