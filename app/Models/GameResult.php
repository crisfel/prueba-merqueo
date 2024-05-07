<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(array $array)
 * @method static find(int $teamID)
 * @property int|mixed $num_goals
 * @property int|mixed $num_red_cards
 * @property int|mixed $num_yellow_cards
 * @property mixed $game_id
 * @property mixed $team_id
 */
class GameResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'num_goals',
        'num_yellow_cards',
        'num_red_cards',
        'game_id',
        'team_id'
    ];
}
