<?php

namespace App\Providers;

use App\Http\View\Composers\AppComposer;
use App\Http\View\Composers\CartComposer;
use App\Http\View\Composers\FooterComposer;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        View::composer('front.layouts.partials.cart', CartComposer::class);
        View::composer('front.layouts.app', AppComposer::class);

    }
}
