<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $fillable = [
        'cnpj', 
        'corporate_name', 
        'contact_name', 
        'contact_phone', 
        'place', 
        'number', 
        'complement', 
        'district', 
        'city', 
        'state', 
        'country', 
        'cep'
    ];
}
