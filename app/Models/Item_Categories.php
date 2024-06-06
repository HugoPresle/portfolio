<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Item_Categories extends Model
{
    protected $table = 'Item_Categories';
    protected $primaryKey = 'item_categories_id';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
    ];
}
