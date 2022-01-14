<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Console\Command;

use App\Helpers\Helper;

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
Route::get('/clear-cache', function(){ Artisan::call('cache:clear'); });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

// Main Page Route
Route::get('/', [DashboardController::class,'dashboardEcommerce'])->middleware('auth');
  /* User */
Route::group(['prefix' => 'user'], function () {
    Route::get('index', [UserController::class,'index'])->middleware('auth')->middleware('permission:UserRead');
    Route::get('edit', [UserController::class,'edit'])->middleware('auth')->middleware('permission:UserUpdate');
    Route::get('view', [UserController::class,'view'])->middleware('auth')->middleware('permission:UserRead');
    Route::get('role', [UserController::class,'role'])->middleware('auth')->middleware('permission:UserRead'); /**/
    Route::post('update_user', [UserController::class,'update_user'])->middleware('auth')->middleware('permission:UserUpdate');
    Route::get('permission', [UserController::class,'permission'])->middleware('auth')->middleware('permission:UserRead'); /**/
    Route::post('add_role', [UserController::class,'add_role'])->middleware('auth')->middleware('permission:UserCreate');
    Route::post('add_permission', [UserController::class,'add_permission'])->middleware('auth')->middleware('permission:UserUpdate'); /**/
    Route::post('update_role', [UserController::class,'update_role'])->middleware('auth')->middleware('permission:UserUpdate');
    Route::post('update_permission', [UserController::class,'update_permission'])->middleware('auth')->middleware('permission:UserUpdate'); /**/
    Route::get('UserListDataTable', [UserController::class,'UserListDataTable'])->middleware('auth')->middleware('permission:UserRead');
});




Route::get('/error', [MiscellaneousController::class,'error'])->name('error')->middleware('auth');