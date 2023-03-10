<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\PrivilegeController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/users',[UserController::class, 'index']);
Route::get('/users/{user}',[UserController::class, 'show']);
Route::post('/users',[UserController::class, 'store']);
Route::put('/users/{user}', [UserController::class, 'update']);
Route::delete('/users/{user}',[UserController::class, 'destroy']);

Route::get('/privileges',[PrivilegeController::class, 'index']);
Route::get('/privileges/{privilege}',[PrivilegeController::class, 'show']);
Route::post('/privileges',[PrivilegeController::class, 'store']);
Route::put('/privileges/{privilege}', [PrivilegeController::class, 'update']);
Route::delete('/privileges/{privilege}',[PrivilegeController::class, 'destroy']);