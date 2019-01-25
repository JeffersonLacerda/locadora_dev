<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Movie;
use App\Models\Type;
use App\Models\Distributor;
use App\Services\Util;

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
        $distributors = Distributor::all();
        return view('movie.form', compact('countries','types','distributors'));
    }

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        try{
            $movie->delete();
        }catch (\Exception $e) {
            return redirect()->route('movie.index')->with('erro', 'Este registro não pode ser removido afim de garantir a integridade do banco de dados.');
        }
        return redirect()->route('movie.index');
    }
}
