<?php

namespace App\Http\Controllers\Players;

use App\DTOs\PlayerDTO;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Players\PlayerRepositoryInterface;
use App\UseCases\Contracts\Players\SaveIMGPlayerUseCaseInterface;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    protected PlayerRepositoryInterface $playerRepository;
    protected SaveIMGPlayerUseCaseInterface $saveIMGPlayerUseCase;

    public function __construct(PlayerRepositoryInterface $playerRepository, SaveIMGPlayerUseCaseInterface $saveIMGPlayerUseCase)
    {
        $this->playerRepository = $playerRepository;
        $this->saveIMGPlayerUseCase = $saveIMGPlayerUseCase;
    }

    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'nationality' => 'string|required',
            'age' => 'required',
            'position' => 'string|required',
            'playerIMG' => 'mimes:png,jpg,jpeg',
            'jerseyNumber' => 'string|required',
            'teamID' => 'required'
        ]);

        $name = strval($request->input('name'));
        $nationality = strval($request->input('nationality'));
        $age = intval($request->input('age'));
        $position = strval($request->input('position'));
        $jerseyNumber = strval($request->input('jerseyNumber'));
        $teamID = intval($request->input('teamID'));
        $playerIMG = $request->file('playerIMG');

        $playerDTO = new PlayerDTO();
        $playerDTO->setName($name);
        $playerDTO->setNationality($nationality);
        $playerDTO->setAge($age);
        $playerDTO->setPosition($position);
        $playerDTO->setJerseyNumber($jerseyNumber);
        $playerDTO->setTeamID($teamID);
        $playerDTO->setPlayerIMG($playerIMG);

        $player = $this->playerRepository->store($playerDTO);

        if ($request->hasFile('playerIMG')) {
            $imgURL = $this->saveIMGPlayerUseCase->handle($playerIMG, $player->id);
            $this->playerRepository
                ->update(
                    $player->id,
                    null,
                    null, null,
                    null,
                    null,
                    $imgURL);
        }

        if (isset($player)) {
            return response(['message' => 'Player Stored'], 200);
        } else {
            return response(['message' => 'Bad Request'], 400);
        }
    }
}
