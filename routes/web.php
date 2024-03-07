<?php

use App\Http\Controllers\AksesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
Route::get('/', [LandingpageController::class,'index'])->name('landing');

Route::get('/show/{id}', [LandingpageController::class, 'show'])->name('landing.show');



Route::get('/login', function () {
    return view('login.login');
});

Route::get('/register', function(){
    return view('login.register');
});

Route::post('/register/store',[LoginController::class,'register'])->name('login.register.store');

Route::post('/login', [LoginController::class,'login'])->name('login.login');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/forget', function () {
    return view('login.forget');})->name('forget');
Route::post('/reset', [LoginController::class,'reset'])->name('reset');

Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::PUT('/user/photo/{id}', [UserController::class, 'photo'])->name('user.photo');
Route::get('/user/{id}/show', [UserController::class, 'show'])->name('user.show');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::get('/user/{id}/custom', [UserController::class, 'custom'])->name('user.custom');
Route::PUT('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::PUT('/user/update_profile/{id}', [UserController::class, 'update_profile'])->name('user.profile');
Route::DELETE('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');

Route::resource('/dashboard',DashboardController::class);

Route::resource('/photo',PhotoController::class);
Route::get('/laporan',[PhotoController::class,'laporan_photo'])->name('laporan.photo');
Route::post('laporan/photo/cetak',[PhotoController::class,'cetak_photo'])->name('cetak.photo');

Route::resource('/role',RoleController::class);
Route::resource('/akses',AksesController::class);
