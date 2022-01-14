<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\UserController;
use Illuminate\Console\Command;
use Inertia\Inertia;

use App\Helpers\Helper;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     // return $request->user();
//     echo "test";
//     exit;
// });

// Route::post('login', [AuthController::class, 'signin']);
// Route::post('register', [AuthController::class, 'signup']);

Route::group(['prefix' => 'user'], function () {
    Route::post('login', [UserController::class,'login']);
    Route::post('register', [UserController::class,'register']);
    Route::post('invite', [UserController::class,'invite'])->middleware('auth')->middleware('permission:Admin');
    
});