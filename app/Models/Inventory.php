<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $table = 'Inventory';
    protected $primaryKey = 'inventory_id';

    protected $fillable = [
        'player_id',
        'item_id',
        'quantity',
        'updated_at',
        'created_at'
    ];

    public function item()
    {
        return $this->belongsTo(Items::class, 'item_id');
        
    }

    public function player()
    {
        return $this->belongsTo(Player::class, 'player_id');
    }
}
