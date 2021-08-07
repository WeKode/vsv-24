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
    Route::get('dashboard',[\App\Http\Controllers\Admin\AdminController::class,'index'])->name('dashboard');

    Route::resource('admins',\App\Http\Controllers\Admin\AdminController::class);
    Route::resource('users',\App\Http\Controllers\Admin\UserController::class)->except(['show', 'create', 'store']);
    Route::resource('orders',\App\Http\Controllers\Admin\OrderController::class)->except(['show', 'create', 'store', 'destroy']);


    Route::get('brands/list',[\App\Http\Controllers\Admin\BrandController::class,'getBrandsList'])
        ->name('brands.list.index');
    Route::resource('brands',\App\Http\Controllers\Admin\BrandController::class);
    Route::resource('attributes',\App\Http\Controllers\Admin\AttributeController::class);

    Route::resource('attribute-values',\App\Http\Controllers\Admin\AttributeValueController::class);

    Route::post('products/{id}/attribute-values',[App\Http\Controllers\Admin\ProductController::class,'valueStore'])->name('products.attribute-values.store');
    Route::delete('products/{id}/attribute-values',[App\Http\Controllers\Admin\ProductController::class,'valueDestroy'])->name('products.attribute-values.delete');

    Route::post('products/image/upload',[App\Http\Controllers\Admin\ImageController::class,'store'])->name('products.images.upload');
    Route::get('products/{id}/delete',[App\Http\Controllers\Admin\ImageController::class,'destroy'])->name('products.images.delete');
    Route::resource('products',\App\Http\Controllers\Admin\ProductController::class);


    Route::GET("setting",[\App\Http\Controllers\Admin\SettingsController::class,'index'])->name("setting.index");
    Route::POST("setting",[\App\Http\Controllers\Admin\SettingsController::class,'update'])->name("setting.update");
});
