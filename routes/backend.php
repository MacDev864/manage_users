<?php

use App\Http\Controllers\backend\authentications\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::group(
  [
    'prefix' => 'backend',
  ],
  function ($router) {
    Route::post('/auth/register', [AuthController::class, 'register'])->name('auth-register');
    Route::post('/auth/login', [AuthController::class, 'login'])->name('auth-register');
    Route::post('/change_status', [AuthController::class, 'changeStatus'])
      ->name('change_status')
      ->middleware('auth');
    //
    Route::post('/auth/ajax_logout', [AuthController::class, 'ajax_logout'])
      ->name('backend.auth.ajax_logout')
      ->middleware('auth');
  }
);
