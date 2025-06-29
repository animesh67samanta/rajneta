<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthenticationController;
use App\Http\Controllers\api\ApplicationController;
use App\Http\Controllers\api\ToolsController;
use App\Http\Controllers\api\PermissionController;
use App\Http\Controllers\api\AlldataController;
use App\Http\Controllers\api\SurveyController;
use App\Http\Controllers\api\MasterController;
use App\Http\Controllers\api\TermsConditionController;
use App\Http\Controllers\api\DatabaseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);
Route::post('/otp-verification', [AuthenticationController::class, 'otpVerification']);
Route::get('/terms-condition', [TermsConditionController::class, 'termsCondition']);

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthenticationController::class, 'logout']);
    Route::get('/all-login-user-list', [AuthenticationController::class, 'loginUserList']);
    Route::get('/registered-user-count', [AuthenticationController::class, 'registeredUserCount']);
    Route::get('/all-voter-list', [ApplicationController::class, 'allVoterList']);
    Route::get('/individual-voter-details', [ApplicationController::class, 'individualVoterDetails']);
    Route::get('/search-by-first-name', [ApplicationController::class, 'searchByFirstName']);
    Route::post('/family-member-add', [ApplicationController::class, 'familyMemberAdd']);
    Route::post('/family-member-remove', [ApplicationController::class, 'familyMemberRemove']);
    Route::post('/family-member-remove', [ApplicationController::class, 'familyMemberRemove']);
    Route::get('/family-member-list', [ApplicationController::class, 'familyMemberList']);
    Route::post('/survey-details-update', [ApplicationController::class, 'surveyDetailsUpdate']);
    Route::get('/caste-list', [ApplicationController::class, 'casteList']);
    Route::get('/advance-search', [ApplicationController::class, 'advanceSearch']);
    Route::get('/search-by-first-middle-surname', [ApplicationController::class, 'searchByFirstMiddleSurname']);
    Route::get('/voters-list-alphabetically', [ApplicationController::class, 'votersListAlphabetically']);
    Route::get('/search-voters-alphabetically', [ApplicationController::class, 'searchVotersAlphabeticalList']);
    Route::get('/village-list', [ApplicationController::class, 'villagesList']);
    Route::get('/search-village', [ApplicationController::class, 'searchVillages']);
    Route::get('/voter-details-by-village', [ApplicationController::class, 'voterDetailsByVillage']);
    Route::get('/partno-list', [ApplicationController::class, 'partNoList']);
    Route::get('/search-partno', [ApplicationController::class, 'searchPartNos']);
    Route::get('/voter-details-by-partnos', [ApplicationController::class, 'voterDetailsByPartNos']);
    Route::get('/voting-centre-list', [ApplicationController::class, 'votingCentreList']);
    Route::get('/search-voting-centre', [ApplicationController::class, 'searchVotingCentre']);
    Route::get('/voter-details-by-voting-centre', [ApplicationController::class, 'voterDetailsByVotingCentre']);

    Route::get('/surname-list', [ApplicationController::class, 'surnameList']);
    Route::get('/search-surname', [ApplicationController::class, 'searchSurname']);
    Route::get('/voter-details-by-surname', [ApplicationController::class, 'voterDetailsBySurname']);

    Route::get('/colour-code-list', [ApplicationController::class, 'colourCodeList']);
    Route::get('/search-colour-code', [ApplicationController::class, 'searchColourCode']);
    Route::get('/voter-details-by-colour-code', [ApplicationController::class, 'voterDetailsByColourCode']);

    Route::get('/mobile-no-list', [ApplicationController::class, 'mobileNoList']);
    Route::get('/search-mobile-no', [ApplicationController::class, 'searchMobileNo']);
    Route::get('/voter-details-by-mobile-no', [ApplicationController::class, 'voterDetailsByMobileNo']);
    Route::get('/voter-details-without-mobile-no', [ApplicationController::class, 'voterDetailsWithoutMobileNo']);

    Route::get('/address-list', [ApplicationController::class, 'addressList']);
    Route::get('/search-address', [ApplicationController::class, 'searchAddress']);
    Route::get('/voter-details-by-address', [ApplicationController::class, 'voterDetailsByAddress']);

    Route::get('/society-list', [ApplicationController::class, 'societyList']);
    Route::get('/search-society', [ApplicationController::class, 'searchSociety']);
    Route::get('/voter-details-by-society', [ApplicationController::class, 'voterDetailsBySociety']);

    Route::get('/gender-list', [ApplicationController::class, 'genderList']);
    Route::get('/search-gender', [ApplicationController::class, 'searchGender']);
    Route::get('/voter-details-by-gender', [ApplicationController::class, 'voterDetailsByGender']);

    Route::get('/search-age-group', [ApplicationController::class, 'searchByAgeGroup']);
    Route::get('/voter-details-by-age-group', [ApplicationController::class, 'voterDetailsByAgeGroup']);

    Route::get('/all-cast-list', [ApplicationController::class, 'castList']);
    Route::get('/search-caste', [ApplicationController::class, 'searchCaste']);
    Route::get('/voter-details-by-caste', [ApplicationController::class, 'voterDetailsByCaste']);

    Route::get('/all-position-list', [ApplicationController::class, 'positionList']);
    Route::get('/search-position', [ApplicationController::class, 'searchPosition']);
    Route::get('/voter-details-by-position', [ApplicationController::class, 'voterDetailsByPosition']);

    Route::get('/all-houseno-list', [ApplicationController::class, 'houseNoList']);
    Route::get('/search-houseno', [ApplicationController::class, 'searchHouseNo']);
    Route::get('/voter-details-by-houseno', [ApplicationController::class, 'voterDetailsByHouseNo']);

    Route::get('/dead-live-list', [ApplicationController::class, 'deadLiveList']);
    Route::get('/dead-voters-details', [ApplicationController::class, 'deadVotersDetails']);
    Route::get('/live-voters-details', [ApplicationController::class, 'liveVotersDetails']);
    Route::get('/dead-live-voters-details', [ApplicationController::class, 'deadLiveVotersDetails']);

    Route::get('/star-voter-list', [ApplicationController::class, 'starVoterList']);
    Route::get('/star-voters-details', [ApplicationController::class, 'starVotersDetails']);

    Route::get('/extra-check-one-voter-list', [ApplicationController::class, 'extraCheckOneVoterList']);
    Route::get('/extra-check-one-voters-details', [ApplicationController::class, 'extraCheckOneVotersDetails']);

    Route::get('/extra-check-two-voter-list', [ApplicationController::class, 'extraCheckTwoVoterList']);
    Route::get('/extra-check-two-voters-details', [ApplicationController::class, 'extraCheckTwoVotersDetails']);

    Route::post('/make-voted-nonvoted', [ApplicationController::class, 'makeVotedNonvoted']);
    Route::get('/voted-list', [ApplicationController::class, 'votedList']);
    Route::get('/voted-voters-details', [ApplicationController::class, 'votedVotersDetails']);

    Route::get('/all-taluka-list', [ApplicationController::class, 'talukaList']);
    Route::get('/search-taluka', [ApplicationController::class, 'searchtaluka']);
    Route::get('/voter-details-by-taluka', [ApplicationController::class, 'voterDetailsByTaluka']);


    Route::get('/today-birthday-list', [ApplicationController::class, 'todayBirthdayList']);
    Route::get('/voter-details-by-today-birthday', [ApplicationController::class, 'todayBirthDayVotersDetails']);
    Route::get('/search-by-today-birthday', [ApplicationController::class, 'searchTodayBirthdayVoter']);

    Route::get('/all-demands-list', [ApplicationController::class, 'demandList']);
    Route::get('/search-demands', [ApplicationController::class, 'searchDemand']);
    Route::get('/voter-details-by-demands', [ApplicationController::class, 'voterDetailsByDemand']);

    Route::get('/personnel-list', [ApplicationController::class, 'personnelList']);
    Route::get('/personnel-voter-details', [ApplicationController::class, 'personnelVotersDetails']);

    Route::get('/extra-information-one-list', [ApplicationController::class, 'extraInformationOneList']);
    Route::get('/search-extra-information-one', [ApplicationController::class, 'searchExtraInformationOne']);
    Route::get('/voter-details-by-extra-information-one', [ApplicationController::class, 'voterDetailsByExtraInfoOne']);

    Route::get('/extra-information-two-list', [ApplicationController::class, 'extraInformationTwoList']);
    Route::get('/search-extra-information-two', [ApplicationController::class, 'searchExtraInformationTwo']);
    Route::get('/voter-details-by-extra-information-two', [ApplicationController::class, 'voterDetailsByExtraInfoTwo']);

    Route::get('/extra-information-three-list', [ApplicationController::class, 'extraInformationThreeList']);
    Route::get('/search-extra-information-three', [ApplicationController::class, 'searchExtraInformationThree']);
    Route::get('/voter-details-by-extra-information-three', [ApplicationController::class, 'voterDetailsByExtraInfoThree']);

    Route::get('/extra-information-four-list', [ApplicationController::class, 'extraInformationFourList']);
    Route::get('/search-extra-information-four', [ApplicationController::class, 'searchExtraInformationFour']);
    Route::get('/voter-details-by-extra-information-four', [ApplicationController::class, 'voterDetailsByExtraInfoFour']);

    Route::get('/extra-information-five-list', [ApplicationController::class, 'extraInformationFiveList']);
    Route::get('/search-extra-information-five', [ApplicationController::class, 'searchExtraInformationFive']);
    Route::get('/voter-details-by-extra-information-five', [ApplicationController::class, 'voterDetailsByExtraInfoFive']);

    Route::get('/repeated-nonrepeated-voters-list', [ApplicationController::class, 'repeatedNonrepeatedList']);
    Route::get('/repeated-nonrepeated-voters-details', [ApplicationController::class, 'repeatedNonrepeatedVotersDetails']);

    Route::get('/all-new-address-list', [ApplicationController::class, 'newAddressList']);
    Route::get('/search-new-address', [ApplicationController::class, 'searchNewAddress']);
    Route::get('/voter-details-by-new-address', [ApplicationController::class, 'voterDetailsByNewAddress']);

    Route::get('/all-voters-slip', [ToolsController::class, 'slipData']);
    Route::post('/sms-permission-store', [ToolsController::class, 'smsPermissionStore']);
    Route::get('/sms-setting', [ToolsController::class, 'smsSettings']);
    Route::get('/sms-permission-fetch', [ToolsController::class, 'smsPermissionFetch']);

    //bluetooth permission
    Route::post('/bluetooth-permission-store', [ToolsController::class, 'bluetoothPermissionStore']);
    Route::get('/bluetooth-setting', [ToolsController::class, 'bluetoothSetting']);
    Route::get('/bluetooth-permission-fetch', [ToolsController::class, 'bluetoothPermissionFetch']);

    Route::get('/all-data-by-all-assembly', [AlldataController::class, 'alldataByAllAssembly']);
    Route::get('/all-user-master-data', [PermissionController::class, 'userMasterData']);

    Route::get('/all-data-by-all-village', [AlldataController::class, 'alldataByAllVillage']);
    Route::get('/all-voters-image', [AlldataController::class, 'allPhotoList']);
    Route::get('/delete-old-photo', [AlldataController::class, 'deleteOldPhotos']);
    Route::get('/download-photo', [AlldataController::class, 'downloadOldPhotos']);
    Route::get('/all-partno-download-list', [AlldataController::class, 'allPartnoDownloadList']);

    Route::get('/export-all-families', [SurveyController::class, 'exportAllFamilies']);
    Route::get('/export-all-modified-families', [SurveyController::class, 'exportAllModifiedFamilies']);
    Route::post('/reset-voted-marking', [SurveyController::class, 'resetVotedMarking']);
    Route::post('/reset-master-data', [SurveyController::class, 'resetMasterData']);

    Route::get('/user-permission', [PermissionController::class, 'userPermissions']);
    Route::get('/app-user-list', [PermissionController::class, 'appUserList']);
    Route::post('/give-user-permission', [PermissionController::class, 'giveUserPermissions']);
    Route::post('/give-user-master-permission', [MasterController::class, 'masterPermission']);

     //Master Data Manage Route
     //For Society
     Route::get('/society-lists-particular-master', [MasterController::class, 'societyList'])->name('society.list.particular.master');
     Route::get('/society-lists-all-masters', [MasterController::class, 'societyListAllMasters'])->name('society.list.all.masters');
     Route::post('/society-create-by-master', [MasterController::class, 'societyCreate'])->name('society.create');


      //For Address
      Route::get('/address-list-all-masters', [MasterController::class, 'addressListAllMasters']);
      Route::post('/address-create-by-master', [MasterController::class, 'addressCreate']);

        //For Karyakarta
    Route::get('/karyakarta-list-all-masters', [MasterController::class, 'karyakartaListAllMasters']);
    Route::post('/karyakarta-create-by-master', [MasterController::class, 'karyakartaCreate']);

    //For Caste
     Route::get('/caste-list-all-masters', [MasterController::class, 'casteListAllMasters']);
     Route::post('/caste-create-by-master', [MasterController::class, 'casteCreate']);
     

    //For position
    Route::get('/position-list-all-masters', [MasterController::class, 'positionListAllMasters']);
    Route::post('/position-create-by-master', [MasterController::class, 'positionCreate']);
     

     Route::get('/society-master-user-list', [MasterController::class, 'societyMasterList']);
     Route::get('/address-master-user-list', [MasterController::class, 'addressMasterList']);
     Route::get('/karyakarta-master-user-list', [MasterController::class, 'KaryakartaMasterList']);
     Route::get('/caste-master-user-list', [MasterController::class, 'casteMasterList']);
     Route::get('/position-master-user-list', [MasterController::class, 'positionMasterList']);
     Route::get('/all-permission-user-list', [MasterController::class, 'allPermissionUserList']);

     Route::get('/backup', [DatabaseController::class, 'backupDatabase']);
     Route::get('/backup/download/{filename}', [DatabaseController::class, 'downloadBackup']);
     Route::get('/backupfiles-list', [DatabaseController::class, 'listBackupFiles']);
     Route::post('/restore-database', [DatabaseController::class, 'restoreDatabase']);

     
    Route::post('/set-user-permission', [PermissionController::class, 'setUserPermission']);
    Route::get('/get-user-permission', [PermissionController::class, 'getUserPermission']);



});



