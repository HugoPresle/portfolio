<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teams_Monster extends Model
{
    use HasFactory;
    protected $table = 'Team_Monster';
    protected $primaryKey = 'team_monster_id';

    protected $fillable = [
        'team_id',
        'capture_id',
        'position',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function capture()
    {
        return $this->belongsTo(Captured::class, 'captured_id');
    }
    
}
