<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Item extends Model
{
    protected $fillable = [
        'serial_number',
        'purchase_date',
        'movie_id',
        'media_id',
    ];
    public function movie(){
        return $this->belongsTo('App\Models\Movie');
    }
    public function media(){
        return $this->belongsTo('App\Models\Media');
    }
    public function getPurchaseDateFormatedAttribute(){
        $data_compra = Carbon::createFromFormat('Y-m-d', $this->purchase_date);
        return $data_compra->format('d/m/Y');
    }

}
