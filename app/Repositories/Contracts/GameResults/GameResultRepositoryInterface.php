<?php

namespace App\Repositories\Contracts\GameResults;

interface GameResultRepositoryInterface
{
    public function getByID(int $teamID);
    public function getByTeamsIDs(int $team1ID, int $team2ID);

    public function getByTeamID(int $teamID);
}
