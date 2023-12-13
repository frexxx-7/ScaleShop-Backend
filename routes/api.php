<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->group(function () {
  Route::get('/user', function (Request $request) {
    return $request->user();
  });
  Route::post('/logout', [AuthController::class, 'logout']);
  Route::get('/adminInfo', [AdminController::class, 'adminInfo']);
  Route::post('/updatePassword', [UserController::class, 'updatePassword']);
});

Route::get('/loadInfoUser/{id}', [UserController::class, 'loadInfoUser']);
Route::post('/editProfile/{id}', [UserController::class, 'editUser']);

Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/signin', [AuthController::class, 'signin']);
