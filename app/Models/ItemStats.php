<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemStats extends Model
{
    use HasFactory;

    protected $table = 'Item_Stats';
    protected $primaryKey = 'item_stats_id';
    public $timestamps = false;

    protected $fillable = [
        'bonus',
        'attack',
        'defense',
        'speed',
        'hp',
    ];
}
