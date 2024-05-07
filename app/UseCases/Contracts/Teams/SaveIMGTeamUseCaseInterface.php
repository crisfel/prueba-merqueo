<?php

namespace App\UseCases\Contracts\Teams;

use Illuminate\Http\UploadedFile;

interface SaveIMGTeamUseCaseInterface
{
    public function handle(?UploadedFile $teamIMG, int $teamID);
}
