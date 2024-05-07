<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed|string $name
 * @property mixed $id
 */
class Tournament extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

}
