<?php

namespace App\UseCases\Tournaments;

use App\Models\Game;
use App\Models\GameResult;
use App\Repositories\Contracts\GameResults\GameResultRepositoryInterface;
use App\Repositories\Contracts\Teams\TeamRepositoryInterface;
use App\UseCases\Contracts\Tournaments\SimulateTournamentUseCaseInterface;

class SimulateTournamentUseCase implements SimulateTournamentUseCaseInterface
{
    private TeamRepositoryInterface $teamRepository;
    private GameResultRepositoryInterface $gameResultRepository;

    public function __construct(TeamRepositoryInterface $teamRepository,
                                GameResultRepositoryInterface $gameResultRepository)
    {
        $this->teamRepository = $teamRepository;
        $this->gameResultRepository = $gameResultRepository;
    }

    public function handle(int $tournamentID)
    {
        $teams = $this->teamRepository->getAll();

        foreach ($teams as $team1) {
            foreach ($teams as $team2) {
                $gamePlayed = 0;
/*
                $team1GameIDs = $this->gameResultRepository->getByID($team1->id)->pluck('game_id')->toArray();
                $team2GameIDs = $this->gameResultRepository->getByID($team2->id)->pluck('game_id')->toArray();

                foreach ($team1GameIDs as $id) {
                    $index = array_search($id, $team2GameIDs);

                    if ($index) {
                        $gamePlayed++;
                    }
                }
*/
                if (($team1->id != $team2->id) && ($gamePlayed == 0)) {
                    //poner repositorio
                    $game = new Game();
                    $game->tournament_id = $tournamentID;
                    $game->save();
                    //

                    //poner repositorio
                    $team1GameResult = new GameResult();
                    $team1GameResult->num_goals = rand(0,10);
                    $team1GameResult->num_yellow_cards = rand(0,5);
                    $team1GameResult->num_red_cards = rand(0,5);
                    $team1GameResult->game_id = $game->id;
                    $team1GameResult->team_id = $team1->id;
                    $team1GameResult->save();
                    //

                    //poner repositorio
                    $team2GameResult = new GameResult();
                    $team2GameResult->num_goals = rand(0,10);
                    $team2GameResult->num_yellow_cards = rand(0,5);
                    $team2GameResult->num_red_cards = rand(0,5);
                    $team2GameResult->game_id = $game->id;
                    $team2GameResult->team_id = $team2->id;
                    $team2GameResult->save();
                    //
                }

            }
        }




    }
}
