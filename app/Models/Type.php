<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $table = 'Monster_Type';
    protected $primaryKey = 'monster_type_id';
    protected $fillable = [
        'nameType',
        'weakness',
        'resistance',
        'immune',
        'color'
    ];

}
