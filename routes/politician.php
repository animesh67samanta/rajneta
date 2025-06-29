<?php
use App\Http\Controllers\politician\AuthPoliticianController;
use App\Http\Controllers\politician\StaffController;
use Illuminate\Support\Facades\Route;


Route::prefix('politician')->name('politician.')->group(function () {
    Route::get('login', [AuthPoliticianController::class, 'showLoginForm'])->name('login');
    Route::post('login-action', [AuthPoliticianController::class, 'login'])->name('login-action');
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [AuthPoliticianController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [AuthPoliticianController::class, 'profile'])->name('profile');
        Route::post('/password/update', [AuthPoliticianController::class, 'passwordUpdate'])->name('password.update');
        Route::post('/profile/update', [AuthPoliticianController::class, 'profileUpdate'])->name('profile.update');
        Route::get('/logout', [AuthPoliticianController::class, 'logout'])->name('logout');
        // Other panchayat routes...
        //Staff Route
        Route::get('/staff/create', [StaffController::class, 'create'])->name('staff.create');
        Route::post('/staff/store', [StaffController::class, 'register'])->name('staff.store');
        Route::get('/staff/list', [StaffController::class, 'list'])->name('staff.list');
        Route::get('/staff/edit/{id}', [StaffController::class, 'edit'])->name('staff.edit');
        Route::post('/staff/update/{id}', [StaffController::class, 'update'])->name('staff.update');
        // Route::get('/app-user/list', [StaffController::class, 'appUserList'])->name('app.user.list');
        // Route::get('/app-user/permission/{id}', [StaffController::class, 'appUserPermissionAdd'])->name('app.user.permission.add');
        // Route::post('/app-user/permission/store/{id}', [StaffController::class, 'appUserPermissionStore'])->name('app.user.permission.store');
        //User Route
        //User Route


    });
});
