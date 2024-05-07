<?php

namespace App\Http\Controllers\Players;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Players\PlayerRepositoryInterface;
use App\Repositories\Contracts\Teams\TeamRepositoryInterface;

class ShowController extends Controller
{
    protected PlayerRepositoryInterface $playerRepository;
    protected TeamRepositoryInterface $teamRepository;

    public function __construct(PlayerRepositoryInterface $playerRepository, TeamRepositoryInterface $teamRepository)
    {
        $this->playerRepository = $playerRepository;
        $this->teamRepository = $teamRepository;
    }

    public function __invoke(int $id)
    {
        $players = $this->playerRepository->getByTeam($id);
        $team = $this->teamRepository->findByID($id);
        return view('players.show', ['players' => $players, 'team' => $team]);
    }

}
