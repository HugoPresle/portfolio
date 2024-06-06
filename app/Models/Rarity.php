<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rarity extends Model
{
    use HasFactory;
    protected $table = 'Rarity';
    protected $primaryKey = 'rarity_id';
    protected $fillable = [
        'name',
        'description',
        'color'
    ];
}
