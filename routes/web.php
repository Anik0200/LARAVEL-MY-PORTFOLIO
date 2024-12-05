<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\EducationController;
use App\Http\Controllers\backend\ExperianceController;
use App\Http\Controllers\backend\FooterController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\ProjectController;
use App\Http\Controllers\backend\ServiceController;
use App\Http\Controllers\backend\SkillController;
use Illuminate\Support\Facades\Route;

route::post('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::group(['middleware' => 'guest'], function () {

    Route::get('login', [AuthController::class, 'login_view'])->name('login');
    Route::post('login', [AuthController::class, 'login']);

    Route::get('register', [AuthController::class, 'register_view'])->name('register');
    Route::post('register', [AuthController::class, 'register']);

});

//Auth Routes End

Route::group(['middleware' => 'auth', 'admin'], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //Dashboard End

    Route::prefix('dashboard/')->name('dashboard.')->group(function () {

        Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
        Route::post('profile/update', [ProfileController::class, 'profile_update'])->name('profile.update');
        //Profile End

        Route::resource('banner', BannerController::class);
        //Banner End

        Route::resource('footer', FooterController::class);
        //Footer End

        Route::resource('service', ServiceController::class);
        //Footer End

        Route::resource('project', ProjectController::class);
        Route::get('project/images/delete/{id}', [ProjectController::class, 'projectGalleryDlt'])->name('project.images.delete');
        Route::get('project/active/{id}', [ProjectController::class, 'projectActive'])->name('project.active');
        Route::get('project/inactive/{id}', [ProjectController::class, 'projectInactive'])->name('project.inactive');
        //Project End

        Route::resource('skill', SkillController::class);
        //Skill End

        Route::resource('education', EducationController::class);
        //Skill End

        Route::resource('experiance', ExperianceController::class);
        //Skill End

    });

});
