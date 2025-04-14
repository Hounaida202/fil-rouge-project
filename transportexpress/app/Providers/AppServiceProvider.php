<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\DAOs\AdminInterface;
use App\DAOs\AdminRepository;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AdminInterface::class, AdminRepository::class);


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
