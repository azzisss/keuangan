<?php

use App\Models\Aruskas;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AruskasController;
use App\Http\Controllers\BukubesarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LabarugiController;
use App\Http\Controllers\NeracasaldoController;

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
//Route authentikasi login logout
Route::get('/login', [LoginController::class, 'indexLogin'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'Logout']);

//route dashboard
Route::get('', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/home', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

//route akun
Route::resource('/akun', AkunController::class)->middleware(['isAdmin', 'auth']);
Route::get('/changepass/{akun:id}', [AkunController::class, 'changepassindex'])->middleware(['isAdmin', 'auth']);
Route::post('/change/{user:id}', [AkunController::class, 'changepass'])->middleware(['isAdmin', 'auth']);

//route aruskas
Route::resource('/aruskas', AruskasController::class)->middleware('auth');
Route::get('/aruskasbaru', [AruskasController::class, 'aruskasbaru'])->middleware('auth');

//route laporan arus kas
Route::get('/laporanaruskas', [AruskasController::class, 'laporan'])->middleware('auth');

//route buku besar
Route::get('/bukubesar', [BukubesarController::class, 'index'])->middleware('auth');

//route laba rugi
Route::get('/labarugi', [LabarugiController::class, 'index'])->middleware('auth');

//Route neraca saldo
Route::get('/neracasaldo', [NeracasaldoController::class, 'index'])->middleware('auth');
Route::post('/neracasaldos', [NeracasaldoController::class, 'submit'])->middleware('auth');
