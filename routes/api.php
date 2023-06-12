<?php

use App\Http\Controllers\ArsipSuratController;
use App\Http\Controllers\AuthenticatedController;
use App\Http\Controllers\CetakSuratController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WordController;
use App\Models\Role;
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

// //Search
// Route::get('/search', 'SearchController@search');


///Cetak Surat
Route::prefix('cetak')->group(function () {
    Route::prefix('suratkeluar')->group(function () {
        Route::get('download/{id}', [SuratKeluarController::class, 'cetak']);
    });
});


//Arsip Surat
Route::prefix('arsipsurat')->group(function () {
    Route::get('/', [ArsipSuratController::class, 'index']);
    Route::post('/', [ArsipSuratController::class, 'store']);
    Route::get('/{arsipsurat}', [ArsipSuratController::class, 'show']);
    Route::put('/{id}', [ArsipSuratController::class, 'update']);
    Route::delete('/{arsipsurat}', [ArsipSuratController::class, 'destroy']);
    Route::get('/cetak/{arsipsurat}', [ArsipSuratController::class, 'cetak']);
});

//Router Jenis Surat
Route::prefix('jenissurat')->group(function () {
    Route::get('/', [JenisSuratController::class, 'index']);
    Route::post('/', [JenisSuratController::class, 'store']);
    Route::get('/{jenissurat}', [JenisSuratController::class, 'show']);
    Route::put('/{id}', [JenisSuratController::class, 'update']);
    Route::delete('/{jenissurat}', [JenisSuratController::class, 'destroy']);
});

//Route Coba PHPWORD
Route::prefix('word')->group(function () {
    Route::get('/word',  WordController::class);
});


//Router Role
Route::prefix('role')->group(function () {
    Route::get('/',  RoleController::class);
});

//Router SuratMasuk
Route::prefix('suratmasuk')->group(function () {
    Route::get('/', [SuratMasukController::class, 'index']);
    Route::post('/', [SuratMasukController::class, 'store']);
    Route::get('/{suratmasuk}', [SuratMasukController::class, 'show']);
    Route::put('/{id}', [SuratMasukController::class, 'update']);
    Route::delete('/{suratmasuk}', [SuratMasukController::class, 'destroy']);
});

//Router SuratKeluar
Route::prefix('suratkeluar')->group(function () {
    Route::get('/', [SuratKeluarController::class, 'index']);
    Route::post('/', [SuratKeluarController::class, 'store']);
    Route::get('/{suratkeluar}', [SuratKeluarController::class, 'show']);
    Route::put('/{id}', [SuratKeluarController::class, 'update']);
    Route::delete('/{suratkeluar}', [SuratKeluarController::class, 'destroy']);
});


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
