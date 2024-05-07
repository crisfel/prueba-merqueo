<?php

namespace App\Http\Controllers\Tournaments;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Tournaments\TournamentRepositoryInterface;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    protected TournamentRepositoryInterface $tournamentRepository;

    public function __construct(TournamentRepositoryInterface $tournamentRepository)
    {
        $this->tournamentRepository = $tournamentRepository;
    }

    public function __invoke()
    {
        $tournaments = $this->tournamentRepository->showAll();


        return view('tournaments.show', ['tournaments' => $tournaments]);
    }
}
