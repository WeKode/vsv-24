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

require __DIR__.'/auth.php';

Route::get('auth/{provider}', [App\Http\Controllers\Auth\SocialiteController::class, 'redirectToProvider'])->name('socialite.redirect');

Route::get('auth/{provider}/callback', [App\Http\Controllers\Auth\SocialiteController::class, 'handleProviderCallback'])->name('socialite.handle');

Route::get('auth/email/{provider}/{id}',[App\Http\Controllers\Auth\SocialiteController::class, 'emailView'])->name('auth.socialite.email');
Route::post('auth/email',[App\Http\Controllers\Auth\SocialiteController::class, 'register'])->name('auth.socialite.register');

Route::view('smartphones', 'front.smartphones')->name('smartphones');
Route::view('/', 'front.home')->name('home');



Route::get('artisan', function (){
    \Illuminate\Support\Facades\Artisan::call("migrate:fresh --seed");
    return "done";
});

Route::get('storage', function (){
    \Illuminate\Support\Facades\Artisan::call("storage:link");
    return "done";
});
