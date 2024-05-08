<?php

namespace App\Repositories\Contracts\Games;

use App\Models\Game;

interface GameRepositoryInterface
{
    public function store(int $tournamentID): Game;
    public function getByTournamentID($tournamentID);
    public function tournamentPositions($tournamentID);
}
