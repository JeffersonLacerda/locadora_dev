<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            'description' => 'required|unique:media',
            'rental_price' => 'required|numeric',
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
            'description' => 'required',
            'rental_price' => 'required|numeric',
        ]);
        $media = Media::findOrFail($id);
        $media->update($request->all());
        return redirect()->route('media.index');
    }
    public function destroy($id)
    {
        $media = Media::findOrFail($id);
        $media->delete();
        return redirect()->route('media.index');
    }
}
