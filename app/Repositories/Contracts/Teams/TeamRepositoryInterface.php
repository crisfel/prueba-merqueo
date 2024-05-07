<?php

namespace App\Repositories\Contracts\Teams;

interface TeamRepositoryInterface
{
    public function findByID(int $id);
    public function store(string $name, string $imgUrl);
    public function update(int $id, string $name, ?string $imgUrl): true;

    public function getAll();
}
