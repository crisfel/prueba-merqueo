<?php

namespace App\Repositories\GameResults;

use App\Models\GameResult;
use App\Repositories\Contracts\GameResults\GameResultRepositoryInterface;

class GameResultRepository implements GameResultRepositoryInterface
{
    public function store($gameID, $teamID): GameResult
    {
        $gameResult = new GameResult();
        $gameResult->num_goals = rand(0,10);
        $gameResult->num_yellow_cards = rand(0,5);
        $gameResult->num_red_cards = rand(0,5);
        $gameResult->game_id = $gameID;
        $gameResult->team_id = $teamID;
        $gameResult->save();

        return $gameResult;
    }

    public function getByID(int $teamID)
    {
        return GameResult::find($teamID);
    }

    public function getByTeamsIDs(int $team1ID, int $team2ID)
    {
        return GameResult::where(['team_id', $team1ID])
            ->orWhere('team_id', $team2ID)
            ->get();
    }

    public function getByTeamID(int $teamID)
    {
        return GameResult::where(['team_id', $teamID])->get();
    }

    public function getByGameID(int $gameID)
    {
        return GameResult::where(['game_id', $gameID])->orderBy('num_goals', 'desc')->first();
    }


}
