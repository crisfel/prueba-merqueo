<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed|string $name
 * @property mixed $img_url
 * @method static find(int $id)
 * @method static get()
 */
class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'img_url'
    ];


    public function players()
    {
        return $this->hasMany(Player::class);
    }
}


