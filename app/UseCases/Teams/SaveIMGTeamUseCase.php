<?php

namespace App\UseCases\Teams;

use App\UseCases\Contracts\Teams\SaveIMGTeamUseCaseInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class SaveIMGTeamUseCase implements SaveIMGTeamUseCaseInterface
{
    public function handle(?UploadedFile $teamIMG, int $teamID)
    {
        Storage::disk('public')->put('teams/' . $teamID . '.png', file_get_contents($teamIMG));

        return '/teams/' . $teamID . '.png';
    }
}
