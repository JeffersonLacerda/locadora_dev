<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Movie;
use App\Models\Type;
use App\Models\Genre;
use App\Services\Util;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Services\TMDB;

class MovieController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:administrator']);
    }

    public function index()
    {
        $movies = Movie::all();
        return view('movie.index', compact('movies'));
    }

    public function create()
    {
        $countries = Util::iso3166();
        $types = Type::all();
        $genres = Genre::all();
        return view('movie.form', compact('countries','types','genres'));
    }

    public function create_tmdb($id)
    {
        $movie_tmdb = TMDb::getMovie($id);
        $credits_tmdb = TMDB::getCredits($id);
        $countries = Util::iso3166();
        $types = Type::all();
        $genres = Genre::all();
        return view('movie.form', compact('movie_tmdb', 'credits_tmdb', 'countries','types','genres'));
    }

    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        $countries = Util::iso3166();
        $types = Type::all();
        $genres = Genre::all();
        /* dd($movie->genres->toArray(), $genres->first()); */
        return view('movie.form', compact('movie', 'countries','types','genres'));
    }

    public function store(Request $request)
    {
        /* dd($request->all()); */
        $request->validate([
            'poster' => 'required',
            'title' => 'required',
            'original_title' => 'required',
            'country' => 'required',
            'year' => 'required',
            'direction' => 'required',
            'cast' => 'required',
            'synopsis' => 'required',
            'duraction' => 'required',
            'type_id' => 'required',
            'genres' => 'required',
        ]);
        if ($request->hasFile('file')) {
            $url = Util::saveImage($request->file, 300);
            $request['poster'] = $url;
        }
        $request['country'] = implode(", ", $request->country);

        try {
            DB::transaction(function () use ($request){
                $movie = Movie::create($request->all());
                foreach ($request->genres as $g) {
                    $genre = Genre::findOrFail($g);
                    $movie->genres()->attach($genre->id);
                }
                /* $movie->genres()->attach(8000); */
            });
        }catch (\Exception $e) {
            return redirect()->route('movie.create')->with('erro', 'Erro na tentativa de inserir o registro no banco de dados.');
        }
        return redirect()->route('movie.index');
    }

    public function update(Request $request, $id)
    {
        /* dd($request->all()); */
        $request->validate([
            'poster' => 'required',
            'title' => 'required',
            'original_title' => 'required',
            'country' => 'required',
            'year' => 'required',
            'direction' => 'required',
            'cast' => 'required',
            'synopsis' => 'required',
            'duraction' => 'required',
            'type_id' => 'required',
            'genres' => 'required',
        ]);
        if ($request->hasFile('file')) {
            $url = Util::saveImage($request->file, 300);
            $request['poster'] = $url;
        }
        $request['country'] = implode(", ", $request->country);

        try {
            DB::transaction(function () use ($request, $id){
                $movie = Movie::findOrFail($id);
                $movie->genres()->sync([]); 
                foreach ($request->genres as $g) {
                    $genre = Genre::findOrFail($g);
                    $movie->genres()->attach($genre->id);
                }
                $movie->update($request->all());
            });
        }catch (\Exception $e) {
            return redirect()->route('movie.create')->with('erro', 'Erro na tentativa de alterar o registro no banco de dados.');
        }
        return redirect()->route('movie.index');
    }

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        try{
            $movie->genres()->sync([]);
            $movie->delete();
        }catch (\Exception $e) {
            return redirect()->route('movie.index')->with('erro', 'Este registro não pode ser removido afim de garantir a integridade do banco de dados.');
        }
        return redirect()->route('movie.index');
    }

    public function tmdb_list($search)
    {
        $tmdb = TMDB::searchMovie($search);
        $qtde = $tmdb->total_results;
        $movies = $tmdb->results;
        return view('movie.tmdb_list', compact('qtde', 'movies'));
    }

}
