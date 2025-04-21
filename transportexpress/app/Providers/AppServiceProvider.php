<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\DAOs\Interfaces\ReclamationInterface;
use App\Http\DAOs\Repositories\ReclamationRepository;
use App\Models\Reclamation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ReclamationInterface::class, ReclamationRepository::class);


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
