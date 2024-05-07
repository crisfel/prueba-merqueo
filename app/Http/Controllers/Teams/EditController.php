<?php

namespace App\Http\Controllers\Teams;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Teams\TeamRepositoryInterface;

class EditController extends Controller
{
    protected TeamRepositoryInterface $teamRepository;

    public function __construct(TeamRepositoryInterface $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    public function __invoke(int $id)
    {
       $team =  $this->teamRepository->findByID($id);

       return view('teams.edit', ['team' => $team]);
    }
}
