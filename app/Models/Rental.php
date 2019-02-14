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


    public function client(){
        return $this->belongsTo('App\Models\Client');
    }

    public function items(){
        return $this->hasMany('App\Models\Rental_item');
    }
}
