<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Guru\DashboardController as GuruDashboardController;
use App\Http\Controllers\Operator\DashboardController;
use App\Http\Controllers\Orangtua\DashboardController as OrangtuaDashboardController;
use App\Http\Controllers\Siswa\DashboardController as SiswaDashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'verify'])->name('auth.verify');

Route::group(['middleware'=>'auth:operator'], function (){
    Route::get('/operator/dashboard', [DashboardController::class, 'index'])->name('operator.dashboard.index');

});

Route::group(['middleware'=>'auth:siswa'], function (){
    Route::get('/siswa/dashboard', [SiswaDashboardController::class, 'index'])->name('siswa.dashboard');
});

Route::group(['middleware'=>'auth:guru'], function (){
    Route::get('/guru/dashboard', [GuruDashboardController::class, 'index'])->name('guru.dashboard');
});

Route::group(['middleware'=>'auth:orangtua'], function (){
    Route::get('/orangtua/dashboard', [OrangtuaDashboardController::class, 'index'])->name('orangtua.dashboard');
});




// Route::get('/operator/home', [DashboardController::class, 'index'])->name('operator.dashboard.index');
// Route::get('/guru/home', [GuruDashboardController::class, 'index'])->name('guru.dashboard.index');
// Route::get('/siswa/home', [SiswaDashboardController::class, 'index'])->name('siswa.dashboard.index');
// Route::get('/orangtua/home', [OrangtuaDashboardController::class, 'index'])->name('orangtua.dashboard.index');

Route::get('/logout',[AuthController::class, 'logout'])->name('logout');