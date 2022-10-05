<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Hospitals\Auth\AuthenticatedSessionController as HosptialsAuth;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController as AdminAuth;

use App\Http\Controllers\Auth\TermsAndConditionsController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;

use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Hospitals\Auth\HospitalsNewPasswordController;
use App\Http\Controllers\Admin\Auth\AdminNewPasswordController;


use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Hospitals\Auth\PasswordResetLinkController as HospitalRPass;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController as AdminRPass;

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Hospitals\Auth\RegisteredHospitalsController;
use App\Http\Controllers\Admin\Auth\RegisteredAdminController;

use App\Http\Controllers\Auth\VerifyEmailController;

use App\Http\Controllers\Auth\ContactUsController;

use Illuminate\Support\Facades\Route;

#Guest panel routes 
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/auth/t&c', [TermsAndConditionsController::class, 'index'])
                ->name('t&c');



    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('Hospitals/auth/forgot-password', [HospitalRPass::class, 'create'])
                ->name('Hospitals.auth.password.request');

    Route::post('Hospitals/auth/forgot-password', [HospitalRPass::class, 'store'])
                ->name('Hospitals.auth.password.email');

    Route::get('Admin/auth/forgot-password', [AdminRPass::class, 'create'])
                ->name('Admin.auth.password.request');

    Route::post('Admin/auth/forgot-password', [AdminRPass::class, 'store'])
                ->name('Admin.auth.password.email');




    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.update');

    Route::get('Hospitals/auth/reset-password/{token}', [HospitalsNewPasswordController::class, 'create'])
                ->name('Hospitals.auth.password.reset');

    Route::post('Hospitals/auth/reset-password', [HospitalsNewPasswordController::class, 'store'])
                ->name('Hospitals.auth.password.update');

    Route::get('Admin/auth/reset-password/{token}', [AdminNewPasswordController::class, 'create'])
                ->name('Admin.auth.password.reset');

    Route::post('Admin/auth/reset-password', [AdminNewPasswordController::class, 'store'])
                ->name('Admin.auth.password.update');
});





#Donors panel routes
Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');

    Route::get('hospitals_list', [RegisteredHospitalsController::class, 'viewHospitals'])
                ->name('hospitals_list');

    Route::post('hospitals_list', [RegisteredHospitalsController::class, 'viewHospitals']);

    Route::get('hospitals_list/search', [RegisteredUserController::class, 'search'])
                ->name('searchHospitals');

    Route::get('/auth/donor/home', function () {
        return view('auth.donor_home');
    })->name('home');

    Route::get('/contactUs', [ContactUsController::class, 'create']);

    Route::post('/contactUs', [ContactUsController::class, 'ContactUsForm'])->name('contactUs');
                
    Route::get('/aboutUs', function () {
        return view('auth.aboutUs');
    })->name('aboutUs');

});


# Hospitals panel routes
Route::prefix('/Hospitals')->name('Hospitals.')->group(function (){

    Route::get('/login', [HosptialsAuth::class, 'create'])->middleware('guest:Hospitals')->name('login');
    Route::post('/login', [HosptialsAuth::class, 'store'])->middleware('guest:Hospitals');

    Route::get('/register', [RegisteredHospitalsController::class, 'create'])
                ->name('register');

    Route::post('/register', [RegisteredHospitalsController::class, 'store']);

    Route::get('/logout', [HosptialsAuth::class, 'destroy'])->name('logout');

    Route::get('/dashboard', function (){
        return 'Hospitals';
    })->middleware('Hospitals');
});


# Admin panel routes
Route::prefix('/Admin')->name('Admin.')->group(function (){

    Route::get('/login', [AdminAuth::class, 'create'])->middleware('guest:Admin')->name('login');
    Route::post('/login', [AdminAuth::class, 'store'])->middleware('guest:Admin');

    Route::get('/register', [RegisteredAdminController::class, 'create'])
                ->name('register');

    Route::post('/register', [RegisteredAdminController::class, 'store']);

    Route::get('/logout', [AdminAuth::class, 'destroy'])->name('logout');

    Route::get('/dashboard', function (){
        return 'Admin';
    })->middleware('Admin');
});