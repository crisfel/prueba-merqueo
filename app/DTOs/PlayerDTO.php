<?php

namespace App\DTOs;

use Illuminate\Http\UploadedFile;

class PlayerDTO
{
    private string $name;
    private ?string $nationality;
    private int $age;
    private string $position;
    private string $jerseyNumber;
    private string $teamID;

    private ?UploadedFile $playerIMG;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getNationality(): string
    {
        return $this->nationality;
    }

    public function setNationality(string $nationality): void
    {
        $this->nationality = $nationality;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function setPosition(string $position): void
    {
        $this->position = $position;
    }

    public function getJerseyNumber(): string
    {
        return $this->jerseyNumber;
    }

    public function setJerseyNumber(string $jerseyNumber): void
    {
        $this->jerseyNumber = $jerseyNumber;
    }

    public function getTeamID(): string
    {
        return $this->teamID;
    }

    public function setTeamID(string $teamID): void
    {
        $this->teamID = $teamID;
    }

    public function getPlayerIMG(): ?UploadedFile
    {
        return $this->playerIMG;
    }

    public function setPlayerIMG(?UploadedFile $playerIMG): void
    {
        $this->playerIMG = $playerIMG;
    }



}
