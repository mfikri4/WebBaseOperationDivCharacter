<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group([],function(){

    Route::prefix('calculation')->group(function(){
        Route::get('/', [CalculationController::class, 'create']);
        Route::post('create', [CalculationController::class, 'store']);
    });

    Route::prefix('user')->group(function(){
        Route::get('/', [UserController::class, 'index']);
        Route::get('create', [UserController::class, 'create']);
        Route::post('create', [UserController::class, 'store']);
        Route::get('edit/{id}', [UserController::class, 'edit']);
        Route::get('edit_pass/{id}', [UserController::class, 'edit_pass']);
        Route::post('edit/{id}', [UserController::class, 'update']);
        Route::post('edit_pass/{id}', [UserController::class, 'update_pass']);
        Route::get('delete/{id}', [UserController::class, 'delete']);
    });

});