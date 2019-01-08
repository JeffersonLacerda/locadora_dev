<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'serial_number',
        'purchase_date',
        'movie_id',
        'media_id',
    ];
}
