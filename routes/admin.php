<?php

use Illuminate\Support\Facades\Route;


Route::get('login',[\App\Http\Controllers\Admin\Auth\AdminLoginController::class,'index'])->name('login.index');
Route::post('login',[\App\Http\Controllers\Admin\Auth\AdminLoginController::class,'login'])->name('login');

Route::get('password/reset/{token}',[\App\Http\Controllers\Admin\Auth\ResetPasswordController::class,'showResetForm'])->name('password.reset');
Route::post('password/reset',[\App\Http\Controllers\Admin\Auth\ResetPasswordController::class,'reset'])->name('reset');

Route::get('forgot/password',[\App\Http\Controllers\Admin\Auth\ForgotPasswordController::class,'showLinkRequestForm'])->name('forgot.password.email');
Route::post('forgot/password',[\App\Http\Controllers\Admin\Auth\ForgotPasswordController::class,'sendResetLinkEmail'])->name('forgot.password.send');


Route::middleware('auth:admin')->group(function (){
    Route::any('logout',[\App\Http\Controllers\Admin\Auth\AdminLoginController::class,'logout'])->name('logout');
    Route::get('dashboard',[\App\Http\Controllers\Admin\DashboardController::class,'index'])->name('dashboard');

    Route::resource('admins',\App\Http\Controllers\Admin\AdminController::class);
    Route::resource('brands',\App\Http\Controllers\Admin\BrandController::class)->except('show');
    Route::resource('attributes',\App\Http\Controllers\Admin\AttributeController::class)->except(['show','create']);

    Route::resource('attribute-values',\App\Http\Controllers\Admin\AttributeValueController::class);
    Route::post('products/image/upload',[App\Http\Controllers\Admin\ImageController::class,'store'])->name('products.images.upload');
    Route::get('products/{id}/delete',[App\Http\Controllers\Admin\ImageController::class,'destroy'])->name('products.images.delete');
    Route::resource('products',\App\Http\Controllers\Admin\ProductController::class);

});
