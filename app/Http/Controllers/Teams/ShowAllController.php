<?php

namespace App\Http\Controllers\Teams;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Teams\TeamRepositoryInterface;

class ShowAllController extends Controller
{
    protected TeamRepositoryInterface $teamRepository;

    public function __construct(TeamRepositoryInterface $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }
    public function __invoke()
    {
        $teams = $this->teamRepository->getAll();

        return view('teams.showAll', ['teams' => $teams]);
    }
}
