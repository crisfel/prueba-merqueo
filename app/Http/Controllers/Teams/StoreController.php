<?php

namespace App\Http\Controllers\Teams;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Teams\TeamRepositoryInterface;
use App\UseCases\Contracts\Teams\SaveIMGTeamUseCaseInterface;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    protected TeamRepositoryInterface $teamRepository;
    protected SaveIMGTeamUseCaseInterface $saveIMGTeamUseCase;

    public function __construct(TeamRepositoryInterface $teamRepository, SaveIMGTeamUseCaseInterface $saveIMGTeamUseCase)
    {
        $this->teamRepository = $teamRepository;
        $this->saveIMGTeamUseCase = $saveIMGTeamUseCase;
    }

    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'teamIMG' => 'mimes:png,jpg,jpeg',
        ]);

        $name = strval($request->input('name'));
        $imgUrl = '';
        $team = $this->teamRepository->store($name, $imgUrl);

        if ($request->hasFile('teamIMG')) {
            $teamIMG = $request->file('teamIMG');
            $imgURL = $this->saveIMGTeamUseCase->handle($teamIMG, $team->id);
            $this->teamRepository->update($team->id, null, $imgURL);
        }

        if (isset($team)) {
            return response(['message' => 'Team Stored'], 200);
        } else {
            return response(['message' => 'Bad Request'], 400);
        }
    }
}
