<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed|string $name
 * @property mixed|string $nationality
 * @property int|mixed $age
 * @property mixed|string $position
 * @property mixed|string $jersey_number
 * @property mixed|string $team_id
 * @property mixed|string $img_url
 * @method static find(int $id)
 * @method static where(string $string)
 */
class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nationality',
        'age',
        'position',
        'jersey_number',
        'img_url',
        'team_id'
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

}
