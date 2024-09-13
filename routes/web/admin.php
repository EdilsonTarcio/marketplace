<?php
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SlideController;
use Illuminate\Support\Facades\Route;

Route::controller(AdminController::class)->group(function (){
    Route::get('admin/dashboard', 'dashboard')->middleware(['auth', 'admin'])->name('dashboard.admin');
    Route::get('admin/login', 'login')->name('login.admin');
    Route::get('admin/forgout-password', 'forgout')->name('forgout.admin');
});

Route::controller(ProfileController::class)->group(function (){
    Route::get('admin/profile', 'index')->middleware(['auth', 'admin'])->name('profile.admin');
    Route::post('admin/profile/update', 'update')->middleware(['auth', 'admin'])->name('profile.admin.update');
    Route::post('admin/profile/update/password', 'updatePassword')->middleware(['auth', 'admin'])->name('profile.admin.password.update');
});

Route::resource('admin/slider', SlideController::class)->middleware(['auth', 'admin']);
