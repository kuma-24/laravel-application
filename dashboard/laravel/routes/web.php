<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\AdministratorAccountController;

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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::group(['prefix' => 'administrator'], function () {
        Route::get('index', [AdministratorController::class, 'index'])->name('administrator.index');
        Route::get('index/show/{id}', [AdministratorController::class, 'show'])->name('administrator.show');
        Route::post('register_authorization', [AdministratorController::class, 'registerAuthorizationFlag'])->name('set-flag');
    });
    Route::get('/account/profile', [AdministratorAccountController::class, 'profile'])->name('account.profile');
    Route::get('/account/profile/edit', [AdministratorAccountController::class, 'edit'])->name('profile.edit');
});