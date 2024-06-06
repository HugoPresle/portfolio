<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Player extends Model implements AuthenticatableContract
{
    use Authenticatable;
    protected $table = 'Player';
    protected $primaryKey = 'player_id';
    protected $fillable = [
        'email',
        'password',
        'username',
        'avatar',
        'background',
        'title',
        'lvl',
        'xp',
        'xp_max',
        'money',
        'gem',
        'stamina',
        'stamina_max',
        'stamina_regen',
        'stamina_regentime',

        'create_time',
        'last_login',
    ];
    public $timestamps = false;

    public function avatar()
    {
        return $this->belongsTo(Image::class, 'avatar');
    }

    public function background()
    {
        return $this->belongsTo(Image::class, 'background');
    }

    public function title()
    {
        return $this->belongsTo(Title::class, 'title');
    }
    
    public function teams()
    {
        return $this->hasMany(Team::class, 'player_id');
    }


    
}
