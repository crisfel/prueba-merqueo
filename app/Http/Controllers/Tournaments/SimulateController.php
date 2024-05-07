<?php

namespace App\Http\Controllers\Tournaments;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Tournaments\TournamentRepositoryInterface;
use App\UseCases\Contracts\Tournaments\SimulateTournamentUseCaseInterface;
use Illuminate\Http\Request;

class SimulateController extends Controller
{
    protected TournamentRepositoryInterface $tournamentRepository;
    protected SimulateTournamentUseCaseInterface $simulateTournamentUseCase;

    public function __construct(TournamentRepositoryInterface $tournamentRepository,
                                SimulateTournamentUseCaseInterface $simulateTournamentUseCase)
    {
        $this->tournamentRepository = $tournamentRepository;
        $this->simulateTournamentUseCase = $simulateTournamentUseCase;
    }

    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
        ]);

        $name = $request->input('name');

        $tournament = $this->tournamentRepository->store($name);

        $this->simulateTournamentUseCase->handle($tournament->id);



        return response($tournament);





    }

}
