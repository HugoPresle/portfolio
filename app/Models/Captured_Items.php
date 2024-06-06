<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Captured_Items extends Model
{
    use HasFactory;
    protected $table = 'Captured_Items';
    protected $primaryKey = 'item_id, captured_id';

    protected $fillable = [
        'item_id',
        'captured_id',
    ];

    public function item()
    {
        return $this->belongsTo(Items::class, 'item_id');
    }

    public function captured()
    {
        return $this->belongsTo(Captured::class, 'captured_id');
    }

}
