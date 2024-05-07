<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $tournament_id
 * @property mixed $id
 */
class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'tournament_id',
        'team_id'
    ];

}
