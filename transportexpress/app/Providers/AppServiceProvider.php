<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\DAOs\AuthInterface;
use App\DAOs\AuthRepository;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AuthInterface::class, AuthRepository::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
