<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->register(RepositoryServiceProvider::class);
        $this->app->bind("App\Repositories\CityRepository", "App\Repositories\CityRepositoryEloquent");
        $this->app->bind("App\Repositories\MenuRepository", "App\Repositories\MenuRepositoryEloquent");
    }
}
