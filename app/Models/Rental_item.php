<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental_item extends Model
{
    protected $fillable = [
        'rental_id',
        'item_id',
        'item_price',
        'discount',
        'surcharge',
        'rental_price',
        'return_deadline',
        'return_deadline_extension',
        'expected_return_date',
        'return_date',
        'return_user',
    ];

    public function item(){
        return $this->belongsTo('App\Models\Item');
    }

}
