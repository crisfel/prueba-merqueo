<?php

namespace App\Repositories\Teams;

use App\Models\Team;
use App\Repositories\Contracts\Teams\TeamRepositoryInterface;

class TeamRepository implements TeamRepositoryInterface
{
    public function findByID(int $id)
    {
        return Team::find($id);
    }

    public function store(string $name, string $imgUrl)
    {
        $team = new Team();
        $team->name = $name;
        $team->img_url = $imgUrl;
        $team->save();

        return $team;
    }

    public function update(int $id, ?string $name, ?string $imgUrl): true
    {
        $team = $this->findByID($id);

        if (isset($name)) {
            $team->name = $name;
        }

        if (isset($imgUrl)) {
            $team->img_url = $imgUrl;
        }

        $team->save();

        return true;
    }

    public function getAll()
    {
        return Team::get();
    }
}
