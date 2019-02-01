<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Media;

class MediaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:administrator']);
    }

    public function index()
    {
        $medias = Media::all();
        return view('media.index', compact('medias'));
    }
    public function create()
    {
        return view('media.form');
    }
    public function store(Request $request)
    {

        $request->validate([
            'description' => 'required|unique:media|max:255',
            'rental_price' => 'required|numeric|gt:0',
        ]);
        Media::create($request->all());
        return redirect()->route('media.index');
    }
    public function edit($id)
    {
        $media = Media::findOrFail($id);
        return view('media.form', compact('media'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => ['required', 'max:255', Rule::unique('media')->ignore($id)],
            'rental_price' => 'required|numeric|gt:0',
        ]);
        $media = Media::findOrFail($id);
        $media->update($request->all());
        return redirect()->route('media.index');
    }
    public function destroy($id)
    {
        $media = Media::findOrFail($id);
        try{
            $media->delete();
        }catch (\Exception $e) {
            return redirect()->route('media.index')->with('erro', 'Este registro não pode ser removido afim de garantir a integridade do banco de dados.');
        }
        return redirect()->route('media.index');
    }
}
