<?php

namespace App\Http\Controllers\Tournaments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('tournaments.create');
    }
}
