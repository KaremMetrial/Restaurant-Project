<?php

    use App\Http\Controllers\Admin\AdminDashboardController as AdminDashboardControllerAlias;
    use App\Http\Controllers\Admin\ProfileController;
    use App\Http\Controllers\Admin\SliderController;
    use Illuminate\Support\Facades\Route;

    Route::group(['as' => 'admin.'], function () {
        // ======================================== Home =============================================================
        Route::get('dashboard', [AdminDashboardControllerAlias::class, 'index'])->name('dashboard');
        // ======================================== Home =============================================================

        // ======================================== Profile ==========================================================
        Route::prefix('profile')->controller(ProfileController::class)->name('profile.')->group(function () {
            // get profile page and data
            Route::get('/', 'index')->name('index');
            // Update Profile Info
            Route::put('/', 'update')->name('update');
            // Update Profile Password
            Route::put('/update-password', 'updatePassword')->name('update.password');
        });
        // ======================================== Profile ==========================================================

        // ======================================== Slider ==========================================================
        Route::resource('sliders', SliderController::class);
        // ======================================== Slider ==========================================================


    });
