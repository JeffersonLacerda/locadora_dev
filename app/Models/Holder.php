<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Holder extends Model
{
    protected $fillable = [
        'cpf',
        'place',
        'number',
        'complement',
        'district',
        'city',
        'state',
        'country',
        'workplace',
        'home_phone',
        'cell_phone',
        'work_phone',
        'client_id',
    ];

    public function dependents(){
        return $this->hasMany('App\Models\Client');
    }

    public function getNameAttribute(){
        $client = $this->dependents()->get();
        $client = $client->where('type', 'Titular')->first();
        return $client->name;
    }
}
