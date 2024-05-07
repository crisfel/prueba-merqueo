<?php

namespace App\Repositories\GameResults;

use App\Models\GameResult;
use App\Repositories\Contracts\GameResults\GameResultRepositoryInterface;

class GameResultRepository implements GameResultRepositoryInterface
{
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



}
