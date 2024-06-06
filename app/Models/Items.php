<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ItemStats;
use App\Models\Item_Categories;

class Items extends Model
{
    use HasFactory;

    protected $table = 'Item';
    protected $primaryKey = 'item_id';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'price',
        'item_stats',
        'item_categories',
        'item_rarity',
        'image',
    ];

    public function itemStats()
    {
        return $this->belongsTo(ItemStats::class, 'item_stats');
    }

    public function itemCategories()
    {
        return $this->belongsTo(Item_Categories::class, 'item_categories');
    }

    public function itemRarity()
    {
        return $this->belongsTo(Rarity::class, 'item_rarity');
    }
}

