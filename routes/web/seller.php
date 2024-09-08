<?php

use App\Http\Controllers\Backend\SellerController;
use Illuminate\Support\Facades\Route;

Route::get('seller/dashboard', [SellerController::class, 'dashboard'])
->middleware(['auth', 'seller'])
->name('dashboard.seller');
