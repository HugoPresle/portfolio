<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Captured extends Model
{
    use HasFactory;
    protected $table = 'Captured';
    protected $primaryKey = 'captured_id';

    protected $fillable = [
        'captured_id',
        'player_id',
        'monster_id',
        'name',
        'level',
        'xp',
        'hp',
        'attack',
        'defense',
        'speed',
        'rarity',
        'isFavorite',
        'isShiny',
    ];
    public function player()
    {
        return $this->belongsTo(Player::class, 'player_id');
    }

    public function monster()
    {
        return $this->belongsTo(Monster::class, 'monster_id');
    }
    public function rarity()
    {
        return $this->belongsTo(Rarity::class, 'rarity');
    }

    public function items()
    {
        return $this->hasMany(Captured_Items::class, 'captured_id');
    }
}
