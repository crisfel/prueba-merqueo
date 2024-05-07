<?php

namespace App\UseCases\Contracts\Players;

use Illuminate\Http\UploadedFile;

interface SaveIMGPlayerUseCaseInterface
{
    public function handle(?UploadedFile $playerIMG, int $playerID);
}
