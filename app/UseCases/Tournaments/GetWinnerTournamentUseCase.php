<?php

namespace App\UseCases\Tournaments;

use App\Repositories\Contracts\Games\GameRepositoryInterface;
use App\Repositories\Contracts\Teams\TeamRepositoryInterface;
use App\UseCases\Contracts\Tournaments\GetWinnerTournamentUseCaseInterface;

class GetWinnerTournamentUseCase implements GetWinnerTournamentUseCaseInterface
{
    protected GameRepositoryInterface $gameRepository;
    protected TeamRepositoryInterface $teamRepository;

    public function __construct(GameRepositoryInterface $gameRepository, TeamRepositoryInterface $teamRepository)
    {
        $this->gameRepository = $gameRepository;
        $this->teamRepository = $teamRepository;
    }

    public function handle($tournamentID)
    {
        $games = $this->gameRepository->getByTournamentID($tournamentID);
        $teams = $this->teamRepository->getAll();
        $teamsArray = array();
        $wonGames = array();




    }
}
