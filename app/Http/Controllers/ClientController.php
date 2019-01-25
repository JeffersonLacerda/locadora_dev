<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Holder;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:customer_service']);
    }

    public function index()
    {
        $clients = Client::with('holder.dependents')->get();
        return view('client.index', compact('clients'));
    }
    public function create()
    {
        return view('client.form');
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
        $client = Client::with('holder.dependents')->where('id',$id)->first();
        return view('client.form', compact('client'));
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

        $client = Distributor::findOrFail($id);
        $client->update($request->all());
        return redirect()->route('distributor.index');
    }
    public function destroy($id)
    {
        $client = Distributor::findOrFail($id);
        $client->delete();
        return redirect()->route('distributor.index');
    }
}
