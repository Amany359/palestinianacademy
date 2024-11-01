<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\FoundrMessageController;
use App\Http\Controllers\Admin\DiscardController;
use App\Http\Controllers\Admin\BoordDirectorController;
use App\Http\Controllers\Admin\IncorpationController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\CapitalController;
use App\Http\Controllers\Admin\BoardScheduleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\GoalController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('admin.home');
})->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('discard', DiscardController::class);
    Route::resource('foundr_messages', FoundrMessageController::class);
    Route::resource('boordDirectors', BoordDirectorController::class);
    
    // Resource route for incorpations
    Route::resource('incorpations', IncorpationController::class);
    Route::resource('settings', SettingController::class);

// Employee routes
Route::resource('employees', EmployeeController::class);
Route::resource('capital', CapitalController::class);
Route::resource('board_schedule', BoardScheduleController::class);
Route::resource('sections', SectionController::class);
Route::resource('goals', GoalController::class);
});