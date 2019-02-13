<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{

    protected $fillable = [
        'client_id',
        'status',
        'rental_user',
    ];

    public function items(){
        return $this->belongsToMany('App\Models\Rental_item');
    }
}
