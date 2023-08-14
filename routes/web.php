<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('admin');
Route::get('/admin-change-status', [AdminController::class, 'updateStatus'])->name('updateStatus');
Route::post('/admin-config', [AdminController::class, 'adminConfig'])->name('admin.config');
Route::post('/admin-time', [AdminController::class, 'updateTime'])->name('admin.time');
Route::post('/admin-warning', [AdminController::class, 'sendWarning'])->name('admin.warning');


Route::get('/user-dashboard', [UserController::class, 'index'])->name('user');
Route::post('/user-config', [UserController::class, 'userConfig'])->name('user.config');

Route::post('/user-login', [UserController::class, 'userLogin'])->name('user.login.social');
Route::post('/user-check', [UserController::class, 'userCheck'])->name('user.check.otp');

Route::post('/user-login-social', [UserController::class, 'loginSocial'])->name('user.login.social.end');


Route::get('/user-facebook', [UserController::class, 'index'])->name('user.social.facebook');
Route::get('/user-google', [UserController::class, 'index'])->name('user.social.google');



Route::get('/social-facebook', [UserController::class, 'facebook'])->name('get.social.facebook');
Route::get('/social-google', [UserController::class, 'google'])->name('get.social.google');

Route::get('/logout-google', [UserController::class, 'logoutGoogle'])->name('out.social.google');
Route::get('/logout-facebook', [UserController::class, 'logoutFacebook'])->name('out.social.facebook');
