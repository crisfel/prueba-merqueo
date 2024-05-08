<?php

namespace App\Providers;

use App\Repositories\Contracts\GameResults\GameResultRepositoryInterface;
use App\Repositories\Contracts\Games\GameRepositoryInterface;
use App\Repositories\Contracts\Players\PlayerRepositoryInterface;
use App\Repositories\Contracts\Teams\TeamRepositoryInterface;
use App\Repositories\Contracts\Tournaments\TournamentRepositoryInterface;
use App\Repositories\GameResults\GameResultRepository;
use App\Repositories\Games\GameRepository;
use App\Repositories\Players\PlayerRepository;
use App\Repositories\Teams\TeamRepository;
use App\Repositories\Tournaments\TournamentRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServicesProvider extends ServiceProvider
{
    protected array $classes = [
        TeamRepositoryInterface::class => TeamRepository::class,
        PlayerRepositoryInterface::class => PlayerRepository::class,
        TournamentRepositoryInterface::class => TournamentRepository::class,
        GameResultRepositoryInterface::class => GameResultRepository::class,
        GameRepositoryInterface::class => GameRepository::class,
    ];

    public function register(): void
    {
        foreach ($this->classes as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    public function boot(): void
    {
        //
    }
}
