<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
            'description' => 'required|max:255|unique:types',
            'return_deadline' => 'required|numeric|gt:0',
            'increase' => 'required|numeric|gte:0',
        ]);
        $request['increase'] = $request->increase / 100;
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
            'description' => ['required', 'max:255', Rule::unique('types')->ignore($id)],
            'return_deadline' => 'required|numeric|gt:0',
            'increase' => 'required|numeric|gte:0',
        ]);
        $type = Type::findOrFail($id);
        $request['increase'] = $request->increase / 100;
        $type->update($request->all());
        return redirect()->route('type.index');
    }
    public function destroy($id)
    {
        $type = Type::findOrFail($id);
        try{
            $type->delete();
        }catch (\Exception $e) {
            return redirect()->route('type.index')->with('erro', 'Este registro não pode ser removido afim de garantir a integridade do banco de dados.');
        }
        return redirect()->route('type.index');
    }
}
