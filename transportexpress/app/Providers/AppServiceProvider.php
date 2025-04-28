<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\DAOs\Interfaces\ReclamationInterface;
use App\Http\DAOs\Repositories\ReclamationRepository;
use App\Http\DAOs\Interfaces\UserInterface;
use App\Http\DAOs\Repositories\UserRepository;
use App\Http\DAOs\Interfaces\AuthInterface;
use App\Http\DAOs\Repositories\AuthRepository;
use App\Http\DAOs\Interfaces\CommentaireInterface;
use App\Http\DAOs\Repositories\CommentaireRepository;
use App\Http\DAOs\Interfaces\NoteInterface;
use App\Http\DAOs\Repositories\NoteRepository;
use App\Http\DAOs\Interfaces\PublicationInterface;
use App\Http\DAOs\Repositories\PublicationRepository;
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
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(AuthInterface::class, AuthRepository::class);
        $this->app->bind(CommentaireInterface::class, CommentaireRepository::class);
        $this->app->bind(NoteInterface::class, NoteRepository::class);
        $this->app->bind(PublicationInterface::class, PublicationRepository::class);

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
