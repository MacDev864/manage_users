<?php

use App\Http\Controllers\backend\authentications\AuthController;
use App\Http\Controllers\backend\user\ProfileController;
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
    /*  Authentication */
    Route::post('/auth/register', [AuthController::class, 'register'])->name('auth-register');
    Route::post('/auth/login', [AuthController::class, 'login'])->name('auth-register');

    Route::group(
      [
        'middleware' => 'auth',
      ],
      function ($router) {
        Route::post('/change_status', [AuthController::class, 'changeStatus'])->name('change_status');
        Route::post('/auth/ajax_logout', [AuthController::class, 'ajax_logout'])->name('backend.auth.ajax_logout');
        Route::get('/user/{id}', [ProfileController::class, 'getProfileById'])->name('backend.profile.id');
        Route::post('/user/create', [ProfileController::class, 'create'])->name('backend.user.create');
        Route::post('/user/update', [ProfileController::class, 'update'])->name('backend.user.update');
        Route::post('/user/delete', [ProfileController::class, 'delete'])->name('backend.user.delete');
        Route::get('/getAll/users', [ProfileController::class, 'getUserById'])->name('backend.user.getAll');
        //
        // /
      }
    );

    // /
  }
);
