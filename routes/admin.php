<?php

use App\Http\Controllers\admin\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\PoliticianController;
use App\Http\Controllers\admin\VoterController;
use App\Http\Controllers\admin\AppuserController;


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
        Route::post('/password/update', [AuthController::class, 'passwordUpdate'])->name('password.update');
        Route::post('/profile/update', [AuthController::class, 'profileUpdate'])->name('profile.update');
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
        // Other admin routes...
        //route for politician add
        Route::get('/politician-create', [PoliticianController::class, 'create'])->name('politician.create');
        Route::post('/politician-store', [PoliticianController::class, 'register'])->name('politician.store');
        Route::get('/politician-list', [PoliticianController::class, 'list'])->name('politician.list');
        //route for user add
        Route::get('/voter-create', [VoterController::class, 'create'])->name('voter.create');
        Route::post('/voter-store', [VoterController::class, 'store'])->name('voter.store');
        Route::get('/voter-list', [VoterController::class, 'list'])->name('voter.list');
        Route::get('/voter-list/edit/{id}', [VoterController::class, 'edit'])->name('voter.edit');
        Route::get('/voter-list/details/{id}', [VoterController::class, 'details'])->name('voter.details');
        Route::post('/voter-list/update/{id}', [VoterController::class, 'update'])->name('voter.update');
        Route::post('/voter-list/delete/{id}', [VoterController::class, 'delete'])->name('voter.delete');
        Route::post('voters-data/bulkUpload', [VoterController::class, 'votersDataBulkUpload'])->name('votersdata.bulkUpload');

        Route::get('/app-user/list', [AppuserController::class, 'appUserList'])->name('app.user.list');
        Route::get('/app-user/permission/{id}', [AppuserController::class, 'appUserPermissionAdd'])->name('app.user.permission.add');
        Route::post('/app-user/permission/store/{id}', [AppuserController::class, 'appUserPermissionStore'])->name('app.user.permission.store');
        Route::post('/app-user/toggle-admin/{id}', [AppUserController::class, 'toggleAdmin'])->name('app.user.toggleAdmin');

         //society list by society master
       Route::get('/society-master/society-list', [AppuserController::class, 'societyMasterSocietyList'])->name('society.list');
       //address list by address master
       Route::get('/address-master/address-list', [AppuserController::class, 'addressMasterAddressList'])->name('address.list');
        //karyakarta list by karyakarta master
        Route::get('/karyakarta-master/karyakarta-list', [AppuserController::class, 'karyakartaMasterKaryakartaList'])->name('karyakarta.list');
        //caste list by caste master
        Route::get('/caste-master/caste-list', [AppuserController::class, 'casteMasterCasteList'])->name('caste.list');
         //position list by position master
        Route::get('/position-master/position-list', [AppuserController::class, 'positionMasterPositionList'])->name('position.list');
    });
});
