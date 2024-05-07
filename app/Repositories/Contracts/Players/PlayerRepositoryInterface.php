<?php

namespace App\Repositories\Contracts\Players;

use App\DTOs\PlayerDTO;

interface PlayerRepositoryInterface
{
    public function store(PlayerDTO $playerDTO);
    public function update(
        int $id,
        ?string $name,
        ?string $age,
        ?string $position,
        ?string $jerseyNumber,
        ?int $teamID,
        ?string $imgUrl):bool;

    public function getByTeam(int $id);
}
