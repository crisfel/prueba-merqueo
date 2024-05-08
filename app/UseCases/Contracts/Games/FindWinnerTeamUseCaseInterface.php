<?php

namespace App\UseCases\Contracts\Games;

interface FindWinnerTeamUseCaseInterface
{
    public function handle(int $tournamentID);
}
