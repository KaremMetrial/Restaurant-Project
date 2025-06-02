<?php

    use App\Http\Controllers\Admin\AdminDashboardController as AdminDashboardControllerAlias;
    use App\Http\Controllers\Admin\ProfileController;
    use Illuminate\Support\Facades\Route;

    Route::group(['as' => 'admin.'], function () {

        // ======================================== Home =============================================================
        Route::get('dashboard', [AdminDashboardControllerAlias::class, 'index'])->name('dashboard');
        // ======================================== Home =============================================================

        // ======================================== Profile ==========================================================
        Route::prefix('profile')->controller(ProfileController::class)->name('profile.')->group(function () {
            // get profile page and data
            Route::get('/', 'index')->name('index');
            // Update Profile
            Route::put('/', 'update')->name('update');
        });
        // ======================================== Profile ==========================================================

    });
