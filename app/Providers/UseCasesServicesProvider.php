<?php

namespace App\Providers;

use App\Repositories\Contracts\Users\UserRepositoryInterface;
use App\Repositories\Users\UserRepository;
use App\UseCases\Contracts\Players\SaveIMGPlayerUseCaseInterface;
use App\UseCases\Contracts\Teams\SaveIMGTeamUseCaseInterface;
use App\UseCases\Contracts\Tournaments\SimulateTournamentUseCaseInterface;
use App\UseCases\Players\SaveIMGPlayerUseCase;
use App\UseCases\Teams\SaveIMGTeamUseCase;
use App\UseCases\Tournaments\SimulateTournamentUseCase;
use Illuminate\Support\ServiceProvider;

class UseCasesServicesProvider extends ServiceProvider
{
    /**
     * Register services.
     */

    protected array $classes = [
        SaveIMGTeamUseCaseInterface::class => SaveIMGTeamUseCase::class,
        SaveIMGPlayerUseCaseInterface::class => SaveIMGPlayerUseCase::class,
        SimulateTournamentUseCaseInterface::class => SimulateTournamentUseCase::class
        ];


    public function register(): void
    {
        foreach ($this->classes as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
