<?php

namespace Acme\Domain\Providers;

use Illuminate\Support\ServiceProvider;
use Acme\Domain\Repositories\Contracts\UsersRepositoryContract;
use Acme\Domain\Repositories\Contracts\OffersRepositoryContract;

class AcmeRepositoriesProvider extends ServiceProvider
{
    public function boot()
    {
        $env = $this->app->environment();

        $services = config('acme');

        if (array_key_exists($env, $services)) {
            $users = $services[$env]['users'];
            $offers = $services[$env]['offers'];
        } else {
            $users = $services['fallback']['users'];
            $offers = $services['fallback']['offers'];
        }

        $this->app->bind(OffersRepositoryContract::class, $offers);
        $this->app->bind(UsersRepositoryContract::class, $users);
    }
}
