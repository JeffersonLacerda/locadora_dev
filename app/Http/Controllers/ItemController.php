<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Movie;
use App\Models\Media;


class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:administrator']);
    }

    public function index()
    {
        $items = Item::all();
        return view('item.index', compact('items'));
    }
    public function create()
    {
        $medias = Media::all();
        $movies = Movie::all();
        return view('item.form', compact('medias','movies'));
    }
    public function store(Request $request)
    {

        $request->validate([
            'serial_number' => 'required',
            'purchase_date' => 'required|date',
            'movie_id' => 'required',
            'media_id' => 'required',
        ]);
        Item::create($request->all());
        return redirect()->route('item.index');
    }
    public function edit($id)
    {
        $medias = Media::all();
        $movies = Movie::all();
        $item = Item::findOrFail($id);
        return view('item.form', compact('item','medias','movies'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'serial_number' => 'required',
            'purchase_date' => 'required|date',
            'movie_id' => 'required',
            'media_id' => 'required',
        ]);
        $item = Item::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('item.index');
    }
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        try{
            $item->delete();
        }catch (\Exception $e) {
            return redirect()->route('item.index')->with('erro', 'Este registro não pode ser removido afim de garantir a integridade do banco de dados.');
        }
        return redirect()->route('item.index');
    }
}
