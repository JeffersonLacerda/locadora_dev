<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:administrator']);
    }

    public function index()
    {
        $types = Type::all();
        return view('type.index', compact('types'));
    }
    public function create()
    {
        return view('type.form');
    }
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|unique:types',
            'return_deadline' => 'required|numeric',
            'increase' => 'required|numeric',
        ]);
        Type::create($request->all());
        return redirect()->route('type.index');
    }
    public function edit($id)
    {
        $type = Type::findOrFail($id);
        return view('type.form', compact('type'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
            'return_deadline' => 'required|numeric',
            'increase' => 'required|numeric',
        ]);
        $type = Type::findOrFail($id);
        $type->update($request->all());
        return redirect()->route('type.index');
    }
    public function destroy($id)
    {
        $type = Type::findOrFail($id);
        $type->delete();
        return redirect()->route('type.index');
    }
}
