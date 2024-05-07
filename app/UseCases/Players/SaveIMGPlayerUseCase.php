<?php

namespace App\UseCases\Players;

use App\UseCases\Contracts\Players\SaveIMGPlayerUseCaseInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class SaveIMGPlayerUseCase implements SaveIMGPlayerUseCaseInterface
{
    public function handle(?UploadedFile $playerIMG, int $playerID)
    {
        Storage::disk('public')->put('players/' . $playerID . '.png', file_get_contents($playerIMG));

        return '/players/' . $playerID . '.png';
    }
}
