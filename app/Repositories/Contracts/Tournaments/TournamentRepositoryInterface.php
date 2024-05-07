<?php

namespace App\Repositories\Contracts\Tournaments;

use App\Models\Tournament;

interface TournamentRepositoryInterface
{
    public function store(string $name): Tournament;
    public function showAll(): \Illuminate\Database\Eloquent\Collection;
}
