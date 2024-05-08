<?php

namespace App\UseCases\Tournaments;

use App\Models\Game;
use App\Models\GameResult;
use App\Repositories\Contracts\GameResults\GameResultRepositoryInterface;
use App\Repositories\Contracts\Games\GameRepositoryInterface;
use App\Repositories\Contracts\Teams\TeamRepositoryInterface;
use App\UseCases\Contracts\Tournaments\SimulateTournamentUseCaseInterface;

class SimulateTournamentUseCase implements SimulateTournamentUseCaseInterface
{
    private TeamRepositoryInterface $teamRepository;
    private GameResultRepositoryInterface $gameResultRepository;
    private GameRepositoryInterface $gameRepository;

    public function __construct(TeamRepositoryInterface $teamRepository,
                                GameResultRepositoryInterface $gameResultRepository,
                                GameRepositoryInterface $gameRepository)
    {
        $this->teamRepository = $teamRepository;
        $this->gameResultRepository = $gameResultRepository;
        $this->gameRepository = $gameRepository;
    }

    public function handle(int $tournamentID)
    {
        $teams = $this->teamRepository->getAll();

        foreach ($teams as $team1) {
            foreach ($teams as $team2) {
                $gamePlayed = 0;
                if (($team1->id != $team2->id) && ($gamePlayed == 0)) {
                    $game = $this->gameRepository->store($tournamentID);
                    $team1GameResult = $this->gameResultRepository->store($game->id, $team1->id);
                    $team2GameResult = $this->gameResultRepository->store($game->id, $team2->id);
                }
            }
        }
    }
}
