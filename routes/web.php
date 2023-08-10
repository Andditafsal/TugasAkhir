<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SuratMasukController;

use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\DataExcelController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

// Route::get('/', function () {
//     return view('welcome'); //route default
// });

Route::get('/{any}', [PageController::class, 'app'])->where('any', '^(?!auth|exportsuratmasuk|exportsuratkeluar).*$'); //tampilan methodnya app
Route::get('auth/{any}', [PageController::class, 'auth']); //tampilan methodnya ke auth

Route::post('import', 'App\Http\Controllers\ExcelController@import')->name('import');
Route::get('export', 'App\Http\Controllers\ExcelController@export')->name('export');




//export excel suratmasuk
Route::get('/exportsuratmasuk', [SuratMasukController::class, 'suratmasukexport'])->name('exportsuratmasuk');


//export excel suratKeluar
Route::get('/exportsuratkeluar', [SuratKeluarController::class, 'suratkeluarexport'])->name('exportsuratkeluar');
