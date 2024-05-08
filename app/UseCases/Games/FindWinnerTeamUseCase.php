<?php

namespace App\UseCases\Games;

use App\Repositories\Contracts\GameResults\GameResultRepositoryInterface;
use App\Repositories\Contracts\Games\GameRepositoryInterface;
use App\UseCases\Contracts\Games\FindWinnerTeamUseCaseInterface;

class FindWinnerTeamUseCase implements FindWinnerTeamUseCaseInterface
{
    protected GameRepositoryInterface $gameRepository;
    protected GameResultRepositoryInterface $gameResultRepository;

    public function __construct(GameRepositoryInterface $gameRepository, GameResultRepositoryInterface $gameResultRepository)
    {
        $this->gameRepository = $gameRepository;
        $this->gameResultRepository = $gameResultRepository;
    }

    public function handle(int $tournamentID)
    {
        $games = $this->gameRepository->getByTournamentID($tournamentID);

        foreach ($games as $game) {
            $gameResult = $this->gameResultRepository->getByGameID($game->id);
            $game->team_id = $gameResult->team_id;
            $game->save();
        }
    }
}
