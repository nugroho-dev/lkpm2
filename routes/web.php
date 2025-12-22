<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PdfDashboardDownload;
use App\Http\Controllers\DashboardIzinController;
use App\Http\Controllers\DashboardLaporanController;
use App\Http\Controllers\DashboardUserNibController;

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

//Route::get('/', function () {
// return view('welcome');
//});

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::post('/store/nib', [DashboardUserNibController::class, 'store'])->middleware('auth');
Route::get('/proyek', [DashboardController::class, 'proyek'])->middleware('auth');
Route::resource('/proyek/laporan', DashboardLaporanController::class)->middleware('auth');
Route::get('/proyek/izin', [DashboardIzinController:: class, 'index'])->middleware('auth');
Route::get('/proyek/download', [DashboardLaporanController::class, 'viewpdf'])->middleware('auth');
