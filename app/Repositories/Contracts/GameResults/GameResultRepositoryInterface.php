<?php

namespace App\Repositories\Contracts\GameResults;

use App\Models\GameResult;

interface GameResultRepositoryInterface
{
    public function getByID(int $teamID);
    public function getByTeamsIDs(int $team1ID, int $team2ID);

    public function getByTeamID(int $teamID);
    public function store($gameID, $teamID): GameResult;

    public function getByGameID(int $gameID);
}
