<?php

    use App\Http\Controllers\Admin\AdminDashboardController as AdminDashboardControllerAlias;
    use Illuminate\Support\Facades\Route;

    Route::group(['as' => 'admin.'], function () {
        Route::get('dashboard', [AdminDashboardControllerAlias::class, 'index'])->name('dashboard');
    });
