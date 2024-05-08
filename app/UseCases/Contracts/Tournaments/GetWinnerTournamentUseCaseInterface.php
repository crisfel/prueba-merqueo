<?php

namespace App\UseCases\Contracts\Tournaments;

interface GetWinnerTournamentUseCaseInterface
{
    public function handle($tournamentID);
}
