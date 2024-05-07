<?php

namespace App\Http\Controllers\Players;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{


    public function __invoke(int $id)
    {
        return view('players.create', ['teamID' => $id]);
    }
}
