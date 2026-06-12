<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'matchId',
        'player1Id',
        'player2Id',
        'player1HP',
        'player2HP',
        'round',
        'isActive',
        'winnerId',
    ];
}
