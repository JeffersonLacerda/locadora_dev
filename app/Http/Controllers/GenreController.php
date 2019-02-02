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
            'description' => ['required', 'max:255', Rule::unique('genres')->ignore($id)],
        ]);
        $genre = Genre::findOrFail($id);
        $genre->update($request->all());
        return redirect()->route('genre.index');
    }
    public function destroy($id)
    {
        $genre = Genre::findOrFail($id);
        try{
            $genre->delete();
        }catch (\Exception $e) {
            return redirect()->route('genre.index')->with('erro', 'Este registro não pode ser removido afim de garantir a integridade do banco de dados.');
        }
        return redirect()->route('genre.index');
    }
}
