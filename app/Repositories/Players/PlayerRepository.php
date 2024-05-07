<?php

namespace App\Repositories\Players;

use App\DTOs\PlayerDTO;
use App\Models\Player;
use App\Repositories\Contracts\Players\PlayerRepositoryInterface;

class PlayerRepository implements PlayerRepositoryInterface
{
    public function store(PlayerDTO $playerDTO)
    {
        $player = new Player();
        $player->name = $playerDTO->getName();
        $player->nationality = $playerDTO->getNationality();
        $player->age = $playerDTO->getAge();
        $player->position = $playerDTO->getPosition();
        $player->jersey_number = $playerDTO->getJerseyNumber();
        $player->team_id = $playerDTO->getTeamID();
        $player->img_url = '';
        $player->save();

        return $player;
    }


    public function update(
        int $id,
        ?string $name,
        ?string $age,
        ?string $position,
        ?string $jerseyNumber,
        ?int $teamID,
        ?string $imgUrl):bool {

        $player = Player::find($id);

        if (isset($name)) {
            $player->name = $name;
        }

        if (isset($age)) {
            $player->age = $age;
        }

        if (isset($jerseyNumber)) {
            $player->jersey_number = $jerseyNumber;
        }

        if (isset($position)) {
            $player->position = $position;
        }

        if (isset($teamID)) {
            $player->teamID = $teamID;
        }

        if (isset($imgUrl)) {
            $player->img_url = $imgUrl;
        }

        $player->save();

        return true;
    }

    public function getByTeam(int $id)
    {
        return Player::where('team_id', $id)->get();
    }
}
