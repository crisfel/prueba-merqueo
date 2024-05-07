<?php

namespace App\Repositories\Tournaments;

use App\Models\Tournament;
use App\Repositories\Contracts\Tournaments\TournamentRepositoryInterface;

class TournamentRepository implements TournamentRepositoryInterface
{
    public function store(string $name): Tournament
    {
        $tournament = new Tournament();
        $tournament->name = $name;
        $tournament->save();

        return $tournament;
    }

    public function showAll(): \Illuminate\Database\Eloquent\Collection
    {
        return Tournament::all();
    }
}
