<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'tmdb_id',
        'title', 
        'original_title', 
        'poster',
        'country', 
        'year', 
        'direction', 
        'cast', 
        'synopsis', 
        'duraction', 
        'type_id', 
    ];

    public function medias(){
        return $this->belongsToMany('App\Models\Media', 'items', 'movie_id', 'media_id');
    }

    public function genres(){
        return $this->belongsToMany('App\Models\Genre');
    }

    public function type(){
        return $this->belongsTo('App\Models\Type');
    }

    public function distributor(){
        return $this->belongsTo('App\Models\Distributor');
    }

    public function getAvailableMediasAttribute(){
        $medias = $this->medias()->get();
        $array = array();
        foreach ($medias as $m){
            if (!in_array($m->description, $array)){
                array_push($array, $m->description);
            }   
        }
        return implode(", ", $array);
    }

    public function getAvailableGenresAttribute(){
        $genres = $this->genres()->get();
        $array = array();
        foreach ($genres as $g){
            if (!in_array($g->description, $array)){
                array_push($array, $g->description);
            }   
        }
        return implode(", ", $array);
    }

    public function getAvailableTypeAttribute(){
        return $this->type()->first()->description;
    }

}
