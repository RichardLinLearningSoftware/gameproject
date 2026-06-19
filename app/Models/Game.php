<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'player1Id',
        'player2Id',
        'player1Choice',
        'player2Choice',
        'isActive',
        'winnerId',
    ];
}
