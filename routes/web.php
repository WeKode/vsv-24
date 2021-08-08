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

Route::get('password/reset/{token}',[\App\Http\Controllers\Auth\NewPasswordController::class,'create'])->name('password.reset');
Route::post('password/reset',[\App\Http\Controllers\Auth\NewPasswordController::class,'store'])->name('reset');

Route::get('forgot/password',[\App\Http\Controllers\Auth\PasswordResetLinkController::class,'create'])->name('forgot.password.email');
Route::post('forgot/password',[\App\Http\Controllers\Auth\PasswordResetLinkController::class,'store'])->name('forgot.password.send');

Route::get('auth/{provider}', [App\Http\Controllers\Auth\SocialiteController::class, 'redirectToProvider'])->name('socialite.redirect');

Route::get('auth/{provider}/callback', [App\Http\Controllers\Auth\SocialiteController::class, 'handleProviderCallback'])->name('socialite.handle');

Route::get('auth/email/{provider}/{id}',[App\Http\Controllers\Auth\SocialiteController::class, 'emailView'])->name('auth.socialite.email');
Route::post('auth/email/{provider}/{id}',[App\Http\Controllers\Auth\SocialiteController::class, 'register'])->name('auth.socialite.register');


Route::middleware('auth')->group(function(){
    Route::any('logout',[\App\Http\Controllers\Auth\AuthenticatedSessionController::class,'destroy'])->name('logout');

    Route::get('/profile', [\App\Http\Controllers\Web\ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [\App\Http\Controllers\Web\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/edit', [\App\Http\Controllers\Web\ProfileController::class, 'update'])->name('profile.update');

    Route::get('/cart/{id}/add', [\App\Http\Controllers\Web\CartController::class, 'addProduct'])->name('cart.add.product');
    Route::get('/cart/{id}/delete', [\App\Http\Controllers\Web\CartController::class, 'delete'])->name('cart.delete.product');
    Route::post('/cart', [\App\Http\Controllers\Web\CartController::class, 'update'])->name('cart.update');
    Route::get('/cart', [\App\Http\Controllers\Web\CartController::class, 'index'])->name('cart.index');

    Route::get('/cart-confirmation', [\App\Http\Controllers\Web\CartConfirmationController::class, 'index'])->name('cart-confirmation.index');
    Route::post('/cart-confirmation', [\App\Http\Controllers\Web\CartConfirmationController::class, 'store'])->name('cart-confirmation.store');

    Route::get('/checkout', [\App\Http\Controllers\Web\CheckoutController::class, 'index'])->name('checkout.index');
    Route::get('/checkout/confirm', [\App\Http\Controllers\Web\CheckoutController::class, 'store'])->name('checkout.confirm');

    Route::get('/notifications', [\App\Http\Controllers\Web\NotificationController::class, 'index'])->name('notifications.index');

    Route::post('/offer-checkout/step-0', [\App\Http\Controllers\Web\OfferCheckoutController::class, 'store'])->name('offer-checkout.store');

    Route::get('/offer-checkout/step-1', [\App\Http\Controllers\Web\OfferCheckoutController::class, 'index1'])->name('offer-checkout.index1');
    Route::post('/offer-checkout/step-1', [\App\Http\Controllers\Web\OfferCheckoutController::class, 'store1'])->name('offer-checkout.store1');

    Route::get('/offer-checkout/step-2', [\App\Http\Controllers\Web\OfferCheckoutController::class, 'index2'])->name('offer-checkout.index2');
    Route::post('/offer-checkout/step-2', [\App\Http\Controllers\Web\OfferCheckoutController::class, 'store2'])->name('offer-checkout.store2');

    Route::get('/offer-checkout/step-3', [\App\Http\Controllers\Web\OfferCheckoutController::class, 'index3'])->name('offer-checkout.index3');
    Route::get('/offer-checkout/step-3/confirm', [\App\Http\Controllers\Web\OfferCheckoutController::class, 'store3'])->name('offer-checkout.store3');

    Route::post('/offer-checkout/confirm', [\App\Http\Controllers\Web\OfferCheckoutController::class, 'store'])->name('offer-checkout.store');




});

Route::get('/smartphones', [\App\Http\Controllers\Web\SmartphoneController::class, 'index'])->name('smartphones.index');
Route::get('/smartphones/{id}', [\App\Http\Controllers\Web\SmartphoneController::class, 'show'])->name('smartphones.show');

Route::get('/energy-providers', [\App\Http\Controllers\Web\EnergyController::class, 'index'])->name('electricity_providers.index');
Route::get('/energy-providers/{id}', [\App\Http\Controllers\Web\EnergyController::class, 'show'])->name('electricity_providers.show');

Route::get('/sim-offers', [\App\Http\Controllers\Web\SimController::class, 'index'])->name('sim_offers.index');
Route::get('/sim-offers/{id}', [\App\Http\Controllers\Web\SimController::class, 'show'])->name('sim_offers.show');
Route::get('/', [\App\Http\Controllers\Web\HomeController::class, 'index'])->name('home');

//
Route::get('/smartphones', [\App\Http\Controllers\Web\SmartphoneController::class, 'index'])->name('smartphones.index');


Route::get('/artisan/migrate', [\App\Http\Controllers\ArtisanController::class, 'migrate']);
Route::get('/artisan/cache', [\App\Http\Controllers\ArtisanController::class, 'cache']);
Route::get('/artisan/storage', [\App\Http\Controllers\ArtisanController::class, 'storage']);

