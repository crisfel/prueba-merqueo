<?php

namespace App\UseCases\Contracts\Tournaments;

interface SimulateTournamentUseCaseInterface
{
    public function handle(int $tournamentID);

}
