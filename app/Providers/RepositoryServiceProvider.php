<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repos = [
        \App\Contracts\UserContract::class => \App\Repositories\UserRepository::class,
        \App\Contracts\AdminContract::class => \App\Repositories\AdminRepository::class,
        \App\Contracts\ProductContract::class => \App\Repositories\ProductRepository::class,

    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        foreach ($this->repos as $abstract => $concrete) {
            $this->app->singleton($abstract, $concrete);
        }
    }
}
