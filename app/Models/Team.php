<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $table = 'Team';
    protected $primaryKey = 'team_id';

    protected $fillable = [
        'team_id',
        'team_name',
        'player_id',
        'principal'
    ];

    public function player()
    {
        return $this->belongsTo(Player::class, 'player_id');
    }

    public function team_monster(){
        return $this->hasMany(Teams_Monster::class, 'team_id');
    }

    
}


