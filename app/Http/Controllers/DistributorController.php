<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distributor;

class DistributorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:administrator']);
    }

    public function index()
    {
        $distributors = Distributor::all();
        return view('distributor.index', compact('distributors'));
    }
    public function create()
    {
        return view('distributor.form');
    }
    public function store(Request $request)
    {
        $request->validate([
            'cnpj'=> 'required|numeric|unique:distributors',
            'corporate_name'=> 'required', 
            'contact_name'=> 'required', 
            'contact_phone'=> 'required', 
            'place'=> 'required', 
            'number'=> 'nullable|numeric',  
            'district'=> 'required', 
            'city'=> 'required', 
            'state'=> 'required', 
            'country'=> 'required', 
            'cep'=> 'required|numeric',
        ]);
        Distributor::create($request->all());
        return redirect()->route('distributor.index');
    }
    public function edit($id)
    {
        $distributor = Distributor::findOrFail($id);
        return view('distributor.form', compact('distributor'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'cnpj'=> 'required|numeric',
            'corporate_name'=> 'required', 
            'contact_name'=> 'required', 
            'contact_phone'=> 'required', 
            'place'=> 'required', 
            'number'=> 'numeric',  
            'district'=> 'required', 
            'city'=> 'required', 
            'state'=> 'required', 
            'country'=> 'required', 
            'cep'=> 'required|numeric',
        ]);
        
        $distributor = Distributor::findOrFail($id);
        $distributor->update($request->all());
        return redirect()->route('distributor.index');
    }
    public function destroy($id)
    {
        $distributor = Distributor::findOrFail($id);
        try{
            $distributor->delete();
        }catch (\Exception $e) {
            return redirect()->route('distributor.index')->with('erro', 'Este registro não pode ser removido afim de garantir a integridade do banco de dados.');
        }
        return redirect()->route('distributor.index');
    }
}
