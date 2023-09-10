<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\AdministratorAccountController;
use App\Http\Controllers\CampaignController;

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

    Route::group(['prefix' => 'campaign'], function () {
        Route::get('create', [CampaignController::class, 'create'])->name('campaign.create');
        Route::post('store', [CampaignController::class, 'store'])->name('campaign.store');
        Route::get('index', [CampaignController::class, 'index'])->name('campaign.index');
        Route::get('index/{campaign}/show', [CampaignController::class, 'show'])->name('campaign.show');
        Route::get('index/{campaign}/edit', [CampaignController::class, 'edit'])->name('campaign.edit');
        Route::patch('index/{campaign}/update', [CampaignController::class, 'update'])->name('campaign.update');
        Route::delete('index/{campaign}', [CampaignController::class, 'delete'])->name('campaign.delete');
    });
});