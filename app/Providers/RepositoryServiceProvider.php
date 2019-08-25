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
        $this->app->bind(\Was\Repositories\SetorRepository::class, \Was\Repositories\SetorRepositoryEloquent::class);
        $this->app->bind(\Was\Repositories\RotaRepository::class, \Was\Repositories\RotaRepositoryEloquent::class);
        $this->app->bind(\Was\Repositories\EscolaRepository::class, \Was\Repositories\EscolaRepositoryEloquent::class);
        $this->app->bind(\Was\Repositories\ServicoRepository::class, \Was\Repositories\ServicoRepositoryEloquent::class);
        $this->app->bind(\Was\Repositories\TipoEmbalagemRepository::class, \Was\Repositories\TipoEmbalagemRepositoryEloquent::class);
        $this->app->bind(\Was\Repositories\EmbalagemRepository::class, \Was\Repositories\EmbalagemRepositoryEloquent::class);
        //:end-bindings:
    }
}
