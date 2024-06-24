<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthConroller as ApiAuthConroller;
use App\Http\Controllers\api\CmsConroller as ApiCmsConroller;
use App\Http\Controllers\api\UsersController as ApiUsersController;

use App\Http\Controllers\api\AuthIndividualController as ApiAuthIndividualController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['GuestApi'])->group(function () {

    Route::controller(ApiCmsConroller::class)->group(function() {
        Route::get('security','securityInfo');
        Route::get('social-setting','socialSetting');
    });

    Route::controller(ApiAuthConroller::class)->group(function() {
        Route::post('login','login');
        Route::post('otp-verify','otpVerify');
        Route::post('resend-otp','resendOtp');
    });

    Route::controller(ApiAuthIndividualController::class)->group(function() {
        Route::post('individual-signup','individualSignup');
    });

    Route::middleware(['AuthApi'])->group(function () {

        Route::controller(ApiUsersController::class)->group(function() {
            Route::get('profile','profile');
            Route::post('profile-request','profileRequest');
            Route::post('notifications','notifications');
            Route::get('account-delete','accountDelete');
            Route::post('language-update','languageUpdate');
        });
        
    });

});
