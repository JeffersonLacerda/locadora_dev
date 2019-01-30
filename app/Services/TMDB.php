<?php

namespace App\Services;

class TMDB
{

    private static $client;
    private static $base_uri = 'https://api.themoviedb.org/';
    private static $language = 'pt-BR';
    public static $config = [
        "images"=>[
            "base_url"=>"http://image.tmdb.org/t/p/",
            "secure_base_url"=>"https://image.tmdb.org/t/p/",
            "backdrop_sizes"=>["w300","w780","w1280","original"],
            "logo_sizes"=>["w45","w92","w154","w185","w300","w500","original"],
            "poster_sizes"=>["w92","w154","w185","w342","w500","w780","original"],
            "profile_sizes"=>["w45","w185","h632","original"],
            "still_sizes"=>["w92","w185","w300","original"]
        ],
        "change_keys"=>["adult","air_date","also_known_as","alternative_titles",
            "biography","birthday","budget","cast","certifications","character_names",
            "created_by","crew","deathday","episode","episode_number","episode_run_time",
            "freebase_id","freebase_mid","general","genres","guest_stars","homepage",
            "images","imdb_id","languages","name","network","origin_country",
            "original_name","original_title","overview","parts","place_of_birth",
            "plot_keywords","production_code","production_companies","production_countries",
            "releases","revenue","runtime","season","season_number","season_regular",
            "spoken_languages","status","tagline","title","translations","tvdb_id",
            "tvrage_id","type","video","videos"]
    ];

    public static function searchMovie(String $query, $page = 1){
        $options = ['query' => [
            'api_key' => env('TMDB_KEY', ''),
            'language' => self::$language,
            'query' => $query,
            'page' => $page,
        ]];
        $response = self::getClient()->request('GET', '/3/search/movie', $options);
        if ($response->getStatusCode() == 200){
            $json = $response->getBody()->getContents();
            $movies = json_decode($json);
        } else {
            $movies = ['page' => 0, 'total_results' => 0, 'total_pages' => 1, 'results' => []];
        }
        return $movies;
    }

    public static function discoverMovie($page = 1, $year = 2018){
        $options = ['query' => [
            'api_key' => env('TMDB_KEY', ''),
            'language' => self::$language,
            'sort_by' => 'popularity.desc',
            'page' => $page,
            'year' => $year,
        ]];
        $response = self::getClient()->request('GET', '/3/discover/movie', $options);
        if ($response->getStatusCode() == 200){
            $json = $response->getBody()->getContents();
            $movies = json_decode($json);
        } else {
            $movies = ['page' => 0, 'total_results' => 0, 'total_pages' => $page, 'results' => []];
        }
        return $movies;
    }

    public static function getMovie($id){
        $options = ['query' => [
            'api_key' => env('TMDB_KEY', ''),
            'language' => self::$language,
        ]];
        $response = self::getClient()->request('GET', "/3/movie/$id", $options);
        if ($response->getStatusCode() == 200){
            $json = $response->getBody()->getContents();
            $movie = json_decode($json);
        } else {
            $movie = [];
        }
        return $movie;
    }

    public static function getCredits($id){
        $options = ['query' => [
            'api_key' => env('TMDB_KEY', ''),
        ]];
        $response = self::getClient()->request('GET', "/3/movie/$id/credits", $options);
        if ($response->getStatusCode() == 200){
            $json = $response->getBody()->getContents();
            $credits = json_decode($json);
        } else {
            $credits = ['cast' => [], 'crew' => []];
        }
        return $credits;
    }

    public static function getGenres(){
        $options = ['query' => [
            'api_key' => env('TMDB_KEY', ''),
            'language' => self::$language,
        ]];
        $response = self::getClient()->request('GET', "/3/genre/movie/list", $options);
        if ($response->getStatusCode() == 200){
            $json = $response->getBody()->getContents();
            $genres = json_decode($json)->genres;
        } else {
            $genres = [];
        }
        return $genres;
    }

    private static function getClient(){
        if (is_null(self::$client)){
            self::$client = new \GuzzleHttp\Client([
                'base_uri' => 'https://api.themoviedb.org/',
            ]);
        }
        return self::$client;
    }

}
