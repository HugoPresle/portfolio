<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Monster extends Model
{
    protected $table = 'Monster';
    protected $primaryKey = 'monster_id';
    protected $fillable = [
        'name',
        'description',
        'image',
        'image_shiny',
        'base_attack',
        'max_attack',
        'base_defense',
        'max_defense',
        'base_speed',
        'max_speed',
        'base_hp',
        'max_hp',
        'base_rarity'
    ];
    public function monsterTypes()
    {
        return $this->hasMany(Monster_Type::class, 'monster_id');
    }
    public function rarity()
    {
        return $this->belongsTo(Rarity::class, 'base_rarity');
    }
    public function captured()
    {
        return $this->hasMany(Captured::class, 'monster_id');
    }
}
