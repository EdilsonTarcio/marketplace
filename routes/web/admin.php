<?php
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoriaController;
use App\Http\Controllers\Backend\CategoriaSegmentoController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SlideController;
use App\Http\Controllers\Backend\SubCategoriaController;
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

//Rotas categorias principais
Route::put('atualiza-status', [CategoriaController::class, 'atualizaStatus'])->name('atualiza.status.category');
Route::resource('admin/categoria', CategoriaController::class)->middleware(['auth', 'admin']);

//Rotas Subcategorias
Route::put('subcategoria/atualiza-status', [SubCategoriaController::class, 'atualizaStatus'])->name('atualiza.status.subcategory');
Route::resource('admin/subcategoria', SubCategoriaController::class)->middleware(['auth', 'admin']);

//Rotas Categoria Segmento
Route::put('categoria-segmento/atualiza-status', [CategoriaSegmentoController::class, 'atualizaStatus'])->name('atualiza.status.categoria-segmento');
Route::resource('admin/categoria-segmento', CategoriaSegmentoController::class)->middleware(['auth', 'admin']);
Route::get('get-subcategorias', [CategoriaSegmentoController::class, 'getSubcategorias'])->name('get-subcategorias');


