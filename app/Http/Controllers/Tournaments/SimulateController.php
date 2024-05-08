<?php

namespace App\Http\Controllers\Tournaments;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Games\GameRepositoryInterface;
use App\Repositories\Contracts\Tournaments\TournamentRepositoryInterface;
use App\UseCases\Contracts\Games\FindWinnerTeamUseCaseInterface;
use App\UseCases\Contracts\Tournaments\GetWinnerTournamentUseCaseInterface;
use App\UseCases\Contracts\Tournaments\SimulateTournamentUseCaseInterface;
use Illuminate\Http\Request;

class SimulateController extends Controller
{
    protected TournamentRepositoryInterface $tournamentRepository;
    protected SimulateTournamentUseCaseInterface $simulateTournamentUseCase;
    protected  FindWinnerTeamUseCaseInterface $findWinnerTeamUseCase;
    protected GameRepositoryInterface $gameRepository;
    protected  GetWinnerTournamentUseCaseInterface $getWinnerTournamentUseCase;

    public function __construct(TournamentRepositoryInterface $tournamentRepository,
                                SimulateTournamentUseCaseInterface $simulateTournamentUseCase,
                                FindWinnerTeamUseCaseInterface $findWinnerTeamUseCase,
                                GameRepositoryInterface $gameRepository,
                                GetWinnerTournamentUseCaseInterface $getWinnerTournamentUseCase
    )
    {
        $this->tournamentRepository = $tournamentRepository;
        $this->simulateTournamentUseCase = $simulateTournamentUseCase;
        $this->findWinnerTeamUseCase = $findWinnerTeamUseCase;
        $this->gameRepository = $gameRepository;
        $this->getWinnerTournamentUseCase = $getWinnerTournamentUseCase;

    }

    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
        ]);

        $name = $request->input('name');
        $tournament = $this->tournamentRepository->store($name);
        $this->simulateTournamentUseCase->handle($tournament->id);
        $this->findWinnerTeamUseCase->handle($tournament->id);
        $this->getWinnerTournamentUseCase->handle($tournament->id);
        dd($this->gameRepository->tournamentPositions($tournament->id));

        $tournamentResult = [

        ];


        //$this->gameRepository->getByTournamentID($tournament->)



        return response($tournament);





    }

}
