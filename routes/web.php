<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
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

Route::middleware(['auth'])->group(function () {

    Route::post('/save_user', [DashboardController::class,'save_user'])->name('save.user'); //ok

    Route::delete('/delete_user/{id}', [DashboardController::class,'delete_user'])->name('delete.user'); //ok

    Route::get('/edit_user/{id}', [DashboardController::class,'edit_user'])->name('edit.user'); //ok

    Route::put('/update_user/{id}', [DashboardController::class,'update_user'])->name('update.user'); //ok

    Route::get('/', [HomeController::class, 'index'])->name('home');
});


Auth::routes();


