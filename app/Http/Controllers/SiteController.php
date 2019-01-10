<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TMDB;
use App\Services\Devs4;
use App\Services\Util;
use Carbon\Carbon;
use \Keygen\Keygen;
use App\Models\Movie;
use App\Models\Item;
use App\Models\Holder;
use App\Models\Client;
use App\Models\Genre;
use App\Models\Media;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function index(Request $request)
    {

        $movies = Movie::with('genres', 'medias', 'type');
        $search = array();
        // Buscar por título
        if ($request->filled('title')) {
            $title = $request->title;
            $search["Titulo"] = $title;
            $movies = $movies->where('title', 'like', "%$title%");
        }
        // Buscar por título original
        if ($request->filled('original_title')) {
            $original_title = $request->original_title;
            $search["Titulo original"] = $original_title;
            $movies = $movies->where('original_title', 'like', "%$original_title%");
        }
        // Busca por Gêneros
        if ($request->filled('genres')) {
            $genres = $request->genres;
            $search["Gênero"] = implode("|", $genres);
            $movies = $movies->whereHas('genres', function ($query) use ($genres) {
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
            $movies = $movies->whereHas('medias', function ($query) use ($medias) {
                for ($i = 0; $i < count($medias); $i++){
                    $media = $medias[$i];
                    if ($i == 0) {
                        $query->where('description',"$media");
                    } else {
                        $query = $query->orWhere('description',"$media");
                    }
                }
            });
        }
        // Buscar por elenco
        if ($request->filled('cast')) {
            $cast = $request->cast;
            $search["Elenco"] = $cast;
            $movies = $movies->where('cast', 'like', "%$cast%");
        }
        // Buscar por direção
        if ($request->filled('direction')) {
            $direction = $request->direction;
            $search["Direção"] = $direction;
            $movies = $movies->where('direction', 'like', "%$direction%");
        }
        // Busca por Nacionalidade
        if ($request->filled('countries')) {
            $countries = $request->countries;
            $search["Nacionalidade"] = implode("|", $countries);
            $movies = $movies->where( function ($query) use ($countries) {
                for ($i = 0; $i < count($countries); $i++){
                    $country = $countries[$i];
                    if ($i == 0) {
                        $query->where('country', 'like', "%$country%");
                    } else {
                        $query = $query->orWhere('country', 'like', "%$country%");
                    }
                }
            });
        }
        // Busca por Tipo (Catálogo ou Lançamento)
        if ($request->filled('types')) {
            $types = $request->types;
            $search["Tipo"] = implode("|", $types);
            $movies = $movies->whereHas('type', function ($query) use ($types) {
                for ($i = 0; $i < count($types); $i++){
                    $type = $types[$i];
                    if ($i == 0) {
                        $query->where('description',"$type");
                    } else {
                        $query = $query->orWhere('description',"$type");
                    }
                }
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
        $movies = $movies->get();
        return view('index', compact('movies', 'search', 'genres', 'medias', 'types', 'countries'));
    }

    public function movie_details($id)
    {
        $movie = Movie::findOrFail($id);
        return view('movie_details', compact('movie'));
    }

    public function serial_number(){
        return Keygen::numeric(20)->generate();
    }

    public function seedPerson(){
        $str = "<pre>";
        $qtd_titulares = 45;
        for ($i=1; $i<=$qtd_titulares; $i++){
            $sexo = Devs4::$choices_sexo[random_int(1, 2)];
            $idade = random_int(20, 60);
            $estado = 'PE';
            $p = Devs4::getPerson($sexo, $idade, 'N', $estado);
            $name = $p->nome;
            $surname = Util::same_surname($p->nome, $p->pai);
            $email = $p->email;
            $gender = Devs4::$sexo[$sexo];
            $data_nasc = Carbon::createFromFormat('d/m/Y', $p->data_nasc);
            $birth_date = $data_nasc->format('Y-m-d');
            $cpf = $p->cpf;
            $place = $p->endereco;
            $number = $p->numero;
            $district = $p->bairro;
            $city = $p->cidade;
            $state = $p->estado;
            $country = 'Brasil';
            $home_phone = $p->telefone_fixo;
            $cell_phone = $p->celular;
            $workplace = Devs4::$choices_empresa[random_int(1, 20)];
            $str .= "
                // -- Titular $i:";
            $str .= "
                \$client = Client::create([
                    'name' => '$name',
                    'email' => '$email',
                    'gender' => '$gender',
                    'birth_date' => '$birth_date',
                    'type' => 'Titular',
                    'holder_id' => null,
                ]);";
            $str .= "
                \$holder = Holder::create([
                    'cpf' => '$cpf',
                    'place' => '$place',
                    'number' => '$number',
                    'complement' => '',
                    'district' => '$district',
                    'city' => '$city',
                    'state' => '$state',
                    'country' => '$country',
                    'workplace' => '$workplace[0]',
                    'home_phone' => '$home_phone',
                    'cell_phone' => '$cell_phone',
                    'work_phone' => '$workplace[1]',
                    'client_id' => \$client->id,
                ]);";
            $str .= "
                // ---- Dependentes do titular $i:";
            $qtd_dependentes = 0;
            if ($idade < 30) {
                $qtd_dependentes = random_int(0, 1);
            } elseif ($idade < 40) {
                $qtd_dependentes = random_int(1, 2);
            } elseif ($idade < 50) {
                $qtd_dependentes = random_int(1, 3);
            } else {
                $qtd_dependentes = random_int(2, 3);
            }
            for ($d=1; $d <= $qtd_dependentes; $d++){
                $sexo = Devs4::swithSex($sexo);
                if ($d == 1) {
                    $idade = random_int($idade -5 , $idade + 5);
                } else {
                    $idade = random_int(8, 19);
                }
                $dependente = Devs4::getPerson($sexo, $idade, 'N', $estado);
                $name = Util::change_surname($dependente->nome, $surname);
                $email = $dependente->email;
                $gender = Devs4::$sexo[$sexo];
                $data_nasc = Carbon::createFromFormat('d/m/Y', $dependente->data_nasc);
                $birth_date = $data_nasc->format('Y-m-d');
                $str .= "
                \Client::create([
                    'name' => '$name',
                    'email' => '$email',
                    'gender' => '$gender',
                    'birth_date' => '$birth_date',
                    'type' => 'Titular',
                    'holder_id' => \$holder->id,
                ]);";
            }
        }
        $str .= "</pre>";
        return $str;
    }

    public function test(){
        return "Teste";
    }

    public function seedItems(){
        $movies = Movie::all();
        foreach ($movies as $m) {
            if ($m->year < 2001) {
                Item::create([
                    'serial_number' => Keygen::numeric(20)->generate(),
                    'purchase_date' => '2019-01-02',
                    'movie_id' => $m->id,
                    'media_id' => 1,
                ]);
                Item::create([
                    'serial_number' => Keygen::numeric(20)->generate(),
                    'purchase_date' => '2019-01-02',
                    'movie_id' => $m->id,
                    'media_id' => 1,
                ]);
            } elseif ($m->year < 2011){
                Item::create([
                    'serial_number' => Keygen::numeric(20)->generate(),
                    'purchase_date' => '2019-01-02',
                    'movie_id' => $m->id,
                    'media_id' => 1,
                ]);
                Item::create([
                    'serial_number' => Keygen::numeric(20)->generate(),
                    'purchase_date' => '2019-01-02',
                    'movie_id' => $m->id,
                    'media_id' => 2,
                ]);
                Item::create([
                    'serial_number' => Keygen::numeric(20)->generate(),
                    'purchase_date' => '2019-01-02',
                    'movie_id' => $m->id,
                    'media_id' => 2,
                ]);
            } else {
                Item::create([
                    'serial_number' => Keygen::numeric(20)->generate(),
                    'purchase_date' => '2019-01-02',
                    'movie_id' => $m->id,
                    'media_id' => 2,
                ]);
                Item::create([
                    'serial_number' => Keygen::numeric(20)->generate(),
                    'purchase_date' => '2019-01-02',
                    'movie_id' => $m->id,
                    'media_id' => 3,
                ]);
                Item::create([
                    'serial_number' => Keygen::numeric(20)->generate(),
                    'purchase_date' => '2019-01-02',
                    'movie_id' => $m->id,
                    'media_id' => 4,
                ]);
                Item::create([
                    'serial_number' => Keygen::numeric(20)->generate(),
                    'purchase_date' => '2019-01-02',
                    'movie_id' => $m->id,
                    'media_id' => 4,
                ]);
            }
        }
        return 'OK';
    }

    public function seedGenres(){
        $genres = TMDB::getGenres();
        $str = "<pre>";
        foreach ($genres as $g) {
            $id = $g->id;
            $name = $g->name;
            $str .= "
                Genre::create([
                    'tmdb_id' => $id,
                    'description' => '$name',
                ]);";
        }
        $str .= "</pre>";
        return $str;
    }

    public function seedMovies(){
        $config = TMDB::$config;
        //$movies = TMDB::discoverMovie(1, 2016)->results;
        $movies = TMDB::searchMovie('Exterminador do futuro')->results;
        $img_url = $config['images']['base_url'];
        $img_size = "original";
        $str = "<pre>";
        foreach ($movies as $movie) {
            $id = $movie->id;
            $m = TMDB::getMovie($id);
            $c = TMDB::getCredits($id);
            $title = $m->title;
            $original_title = $m->original_title;
            $synopsis = addslashes($m->overview);
            $poster = $img_url . $img_size . $m->poster_path;
            $genres = $m->genres;
            $production_countries = $m->production_countries;
            $country = Util::array_to_string($production_countries, 'iso_3166_1');
            $duraction = $m->runtime;
            if ($m->release_date == "") $m->release_date = '1970-01-01';
            $release_date = Carbon::createFromFormat('Y-m-d', $m->release_date);
            $now = Carbon::now();
            $year = $release_date->year;
            $cast = Util::array_to_string($c->cast, 'name');
            $direction = Util::array_to_string($c->crew, 'name', ['job','Director']);
            if ($now->diffInDays($release_date) > 180){
                $type_id = 1; // Catálogo
            } else {
                $type_id = 2; // Lançamento
            }
            $distributor_id = random_int(1, 9);

            $str .= "
                \$movie = Movie::create([
                    'tmdb_id' => '$id',
                    'title' => '$title',
                    'original_title' => '$original_title',
                    'poster' => '$poster',
                    'country' => '$country',
                    'year' => $year,
                    'direction' => '$direction',
                    'cast' => '$cast',
                    'synopsis' => '$synopsis',
                    'duraction' => '$duraction',
                    'type_id' => '$type_id',
                    'distributor_id' => '$distributor_id',
                ]);";

            foreach ($genres as $g) {
                $str .= "
                \$genre = Genre::where('tmdb_id', $g->id)->first();
                \$movie->genres()->attach(\$genre->id);";
            }
        }

        $str .= "</pre>";
        return $str;
    }

}
