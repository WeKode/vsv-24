<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//require __DIR__.'/auth.php';

Route::get('login',[\App\Http\Controllers\Auth\AuthenticatedSessionController::class,'create'])->name('login.index');
Route::post('login',[\App\Http\Controllers\Auth\AuthenticatedSessionController::class,'store'])->name('login');

Route::get('register',[\App\Http\Controllers\Auth\RegisteredUserController::class,'create'])->name('register.index');
Route::post('register',[\App\Http\Controllers\Auth\RegisteredUserController::class,'store'])->name('register');

Route::get('password/reset/{token}',[\App\Http\Controllers\Admin\Auth\ResetPasswordController::class,'showResetForm'])->name('password.reset');
Route::post('password/reset',[\App\Http\Controllers\Admin\Auth\ResetPasswordController::class,'reset'])->name('reset');

Route::get('forgot/password',[\App\Http\Controllers\Admin\Auth\ForgotPasswordController::class,'showLinkRequestForm'])->name('forgot.password.email');
Route::post('forgot/password',[\App\Http\Controllers\Admin\Auth\ForgotPasswordController::class,'sendResetLinkEmail'])->name('forgot.password.send');

Route::get('auth/{provider}', [App\Http\Controllers\Auth\SocialiteController::class, 'redirectToProvider'])->name('socialite.redirect');

Route::get('auth/{provider}/callback', [App\Http\Controllers\Auth\SocialiteController::class, 'handleProviderCallback'])->name('socialite.handle');

Route::get('auth/email/{provider}/{id}',[App\Http\Controllers\Auth\SocialiteController::class, 'emailView'])->name('auth.socialite.email');
Route::post('auth/email',[App\Http\Controllers\Auth\SocialiteController::class, 'register'])->name('auth.socialite.register');


Route::middleware('auth')->group(function(){
    Route::any('logout',[\App\Http\Controllers\Auth\AuthenticatedSessionController::class,'destroy'])->name('logout');
});

Route::get('/smartphones', [\App\Http\Controllers\Web\SmartphoneController::class, 'index'])->name('smartphones.index');
Route::view('/', 'front.home')->name('home');
//Route::view('/login', 'front.auth.login')->name('login');
Route::view('/register', 'front.auth.register')->name('register');


Route::get('artisan', function (){
    \Illuminate\Support\Facades\Artisan::call("migrate:fresh --seed");
    return "done";
});

Route::get('storage', function (){
    \Illuminate\Support\Facades\Artisan::call("storage:link");
    return "done";
});
