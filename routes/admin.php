<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use Illuminate\Support\Facades\Route;


// Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])->middleware('auth', 'role:admin')->name('admin.dashboard');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    
});