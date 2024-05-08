<?php

namespace App\Repositories\Games;

use App\Models\Game;
use App\Repositories\Contracts\Games\GameRepositoryInterface;

class GameRepository implements GameRepositoryInterface
{
    public function store(int $tournamentID): Game
    {
        $game = new Game();
        $game->tournament_id = $tournamentID;
        $game->save();

        return $game;
    }

    public function getByTournamentID($tournamentID)
    {
        return Game::where(['tournament_id', $tournamentID])->get();
    }

    public function tournamentPositions($tournamentID)
    {
        return Game::selectRaw('team_id, count(*) as count')
            ->groupBy('browser')
            ->orderBy('count', 'desc')
            ->first();
    }


}
