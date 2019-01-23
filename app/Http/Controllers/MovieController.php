<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Movie;
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
        return view('movie.form', compact('countries'));
    }
}
