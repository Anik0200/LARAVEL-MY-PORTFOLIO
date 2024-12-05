<?php

use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\FrontController;
use App\Http\Controllers\frontend\ProjectController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('frontend.index');

Route::get('frontend/projects', [ProjectController::class, 'index'])->name('frontend.projects');
Route::get('frontend/projects/details/{id}', [ProjectController::class, 'details'])->name('frontend.projects.details');

Route::post('frontend/contact', [ContactController::class, 'contact'])->name('frontend.contact');

Route::get('command/{name}', function ($name) {
    return Artisan::call($name);
});

