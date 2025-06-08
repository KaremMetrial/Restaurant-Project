<?php

    use App\Http\Controllers\Admin\AdminAuthController;
    use App\Http\Controllers\Frontend\DashboardController;
    use App\Http\Controllers\Frontend\FrontendController as FrontendControllerAlias;
    use App\Http\Controllers\Frontend\ProfileController;
    use Illuminate\Support\Facades\Route;

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

// ============================== Guest ========================================================================
    Route::middleware('guest')->group(function () {
// ============================== Admin Login ========================================================================
        Route::get('admin/login', [AdminAuthController::class, 'login'])->name('admin.login')->middleware('guest');
// ============================== Admin Login ========================================================================
    });
// ============================== Guest ========================================================================


// ============================== Home Page ========================================================================
    Route::get('/', [FrontendControllerAlias::class, 'index'])->name('home');
// ============================== Home Page ========================================================================


// ============================== Auth ========================================================================
    Route::middleware('auth')->group(function () {
// ============================== Dashboard ========================================================================
        Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name(
            'dashboard'
        );
// ============================== Dashboard ========================================================================

// ============================== Profile ========================================================================
        Route::prefix('profile')->name('profile.')->controller(ProfileController::class)->group(function () {
            // Update Profile Data
            Route::put('/update', 'update')->name('update');

            // Update Profile Password
            Route::put('/update-password', 'updatePassword')->name('update.password');

            // Update Profile avatar
            Route::post('/update-image', 'updateImage')->name('update.image');
        });
// ============================== Profile ========================================================================

    });
// ============================== Auth ========================================================================

    require __DIR__ . '/auth.php';
