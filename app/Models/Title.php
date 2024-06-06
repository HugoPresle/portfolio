<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use HasFactory;
    protected $table = 'Title';
    protected $primaryKey = 'title_id';

    protected $fillable = [
        'name',
        'description'
    ];
}
