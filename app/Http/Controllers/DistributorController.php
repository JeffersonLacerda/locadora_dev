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
            'cnpj'=> 'required|numeric|size:14|unique:distributors',
            'corporate_name'=> 'required', 
            'contact_name'=> 'required', 
            'contact_phone'=> 'required', 
            'place'=> 'required', 
            'number'=> 'required',  
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
            'cnpj'=> 'required|numeric|size:14',
            'corporate_name'=> 'required', 
            'contact_name'=> 'required', 
            'contact_phone'=> 'required', 
            'place'=> 'required', 
            'number'=> 'required',  
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
        $distributor->delete();
        return redirect()->route('distributor.index');
    }
}
