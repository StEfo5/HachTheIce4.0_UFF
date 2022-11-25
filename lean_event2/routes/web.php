<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckpointsController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/profile')->group(function(){
    Route::controller(ProfileController::class)->group(function(){
        Route::get('/', 'index');
        Route::post('/update', 'update');
    });
});

Route::prefix('/checkpoints')->group(function(){
    Route::controller(CheckpointsController::class)->group(function(){
        Route::get('/', 'index');
        Route::post('/create', 'create');
    });
    Route::prefix('/{checkpoint_id}')->group(function(){
        Route::controller(CheckpointsController::class)->group(function(){
            
        Route::get('/', 'checkpoint')->name('checkpoint');
        Route::post('/criteria/create', 'criteria_create');
        }); 
    });
});