<?php

use App\Http\Controllers\AuthenticatedController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Router User
Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('/{user}', [UserController::class, 'show']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{user}', [UserController::class, 'destroy']);
});
//end

//router auth
Route::prefix('auth')->group(function () {
    Route::post('/register', RegisterController::class);

    Route::post('/login', LoginController::class);

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('/check', AuthenticatedController::class);

        Route::post('logout', LogoutController::class);
    });
});
//end
