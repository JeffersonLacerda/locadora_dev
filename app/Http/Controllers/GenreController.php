<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Genre;

class GenreController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:administrator']);
    }

    public function index()
    {
        $genres = Genre::all();
        return view('genre.index', compact('genres'));
    }
    public function create()
    {
        return view('genre.form');
    }
    public function store(Request $request)
    {
        $request->validate([
            'tmdb_id' => 'required|numeric|gt:0|unique:genres',
            'description' => 'required|unique:genres|max:255',
        ]);
        Genre::create($request->all());
        return redirect()->route('genre.index');
    }
    public function edit($id)
    {
        $genre = Genre::findOrFail($id);
        return view('genre.form', compact('genre'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'tmdb_id' => ['required', 'numeric', 'gt:0',Rule::unique('genres')->ignore($id)],
            'description' => ['required', 'max:255', Rule::unique('genres')->ignore($id)],
            
        ]);
        $genre = Genre::findOrFail($id);
        $genre->update($request->all());
        return redirect()->route('genre.index');
    }
    public function destroy($id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();
        return redirect()->route('genre.index');
    }
}
