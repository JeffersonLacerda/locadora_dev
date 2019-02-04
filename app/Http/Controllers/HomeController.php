<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TMDB;
use App\Models\Movie;
use App\Models\Item;
use App\Models\Holder;
use App\Models\Client;
use App\Models\Genre;
use App\Models\Media;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function search(Request $request)
    {

        $items = Item::with('movie.genres', 'media');
        $movies = Movie::with('genres', 'medias', 'type');
        $search = array();
        // Buscar por título
        if ($request->filled('title')) {
            $title = $request->title;
            $search["Titulo"] = $title;
            $items = $items->whereHas('movie', function ($query){
                $query->where('title', 'like', "%$title%");
            });
        }
        // Buscar por título original
        if ($request->filled('original_title')) {
            $original_title = $request->original_title;
            $search["Titulo original"] = $original_title;
            $items = $items->whereHas('movie', function ($query){
                $query->where('original_title', 'like', "%$original_title%");
            });
        }
        // Busca por Gêneros
        if ($request->filled('genres')) {
            $genres = $request->genres;
            $search["Gênero"] = implode("|", $genres);
            $items = $items->whereHas('movie.genres', function ($query) use ($genres){
                for ($i = 0; $i < count($genres); $i++){
                    $genre = $genres[$i];
                    if ($i == 0) {
                        $query->where('description',"$genre");
                    } else {
                        $query = $query->orWhere('description',"$genre");
                    }
                }
            });

        }
        // Busca por Mídias
        if ($request->filled('medias')) {
            $medias = $request->medias;
            $search["Mídia"] = implode("|", $medias);
            $items = $items->whereHas('media', function ($query) use ($medias){
                $query->whereIn('description', $medias);
            });
        }
        // Buscar por elenco
        if ($request->filled('cast')) {
            $cast = $request->cast;
            $search["Elenco"] = $cast;
            $items = $items->whereHas('movie', function ($query){
                $query->where('cast', 'like', "%$cast%");
            });
        }
        // Buscar por direção
        if ($request->filled('direction')) {
            $direction = $request->direction;
            $search["Direção"] = $direction;
            $items = $items->whereHas('movie', function ($query){
                $query->where('direction', 'like', "%$direction%");
            });
        }
        // Busca por Nacionalidade
        if ($request->filled('countries')) {
            $countries = $request->countries;
            $search["Nacionalidade"] = implode("|", $countries);
            $items = $items->whereHas('movie', function ($query) use ($countries){
                $query->where( function ($query) use ($countries) {
                    for ($i = 0; $i < count($countries); $i++){
                        $country = $countries[$i];
                        if ($i == 0) {
                            $query->where('country', 'like', "%$country%");
                        } else {
                            $query = $query->orWhere('country', 'like', "%$country%");
                        }
                    }
                });
            });
        }
        // Busca por Tipo (Catálogo ou Lançamento)
        if ($request->filled('types')) {
            $types = $request->types;
            $search["Tipo"] = implode("|", $types);
            $items = $items->whereHas('movie', function ($query)  use ($types){
                $query->whereHas('type', function ($query) use ($types) {
                    for ($i = 0; $i < count($types); $i++){
                        $type = $types[$i];
                        if ($i == 0) {
                            $query->where('description',"$type");
                        } else {
                            $query = $query->orWhere('description',"$type");
                        }
                    }
                });
            });
        }

        //
        $genres = Genre::all();
        $medias = Media::all();
        $types = Type::all();
        $contries_movies = Movie::select('country')->groupBy('country')->get();
        $countries = array();
        foreach ($contries_movies as $m){
            $array = explode(", ", $m->country);
            foreach ($array as $c){
                if (!in_array($c, $countries)){
                    array_push($countries, $c);
                } 
            }  
        }

        //Retonar a tela do catálogo
        $items = $items->get();
        $movies = $movies->get();
        /* if ($request->filled('genres')) {
            dd($items);
        } */
        return view('search', compact('items','movies', 'search', 'genres', 'medias', 'types', 'countries'));
    }

}
