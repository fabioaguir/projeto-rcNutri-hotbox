<?php

namespace Was\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
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
        $this->app->bind(\Was\Repositories\UserRepository::class, \Was\Repositories\UserRepositoryEloquent::class);
        //:end-bindings:
    }
}
