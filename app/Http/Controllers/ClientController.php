<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Client;
use App\Models\Holder;
use App\Services\Util;

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
        $countries = Util::iso3166();
        $state = Holder::groupBy('state')->pluck('state');
        $city = Holder::groupBy('city')->pluck('city');
        $district = Holder::groupBy('district')->pluck('district');
        return view('client.form', compact('countries', 'state', 'city', 'district'));
    }
    public function dependent_create($id)
    {
        $holder = Holder::with('dependents')->findOrFail($id);
        $countries = Util::iso3166();
        $state = Holder::groupBy('state')->pluck('state');
        $city = Holder::groupBy('city')->pluck('city');
        $district = Holder::groupBy('district')->pluck('district');
        if($holder->dependents->count() >= 4){
            return redirect()->route('client.edit', $holder->client_id)->with('erro', 'Foi atingido o limite de 3 dependentes.');
        }
        return view('client.include.dependents_form', compact('id','countries', 'state', 'city', 'district'));
    }
    public function dependent_store(Request $request)
    {
        $holder = Holder::findOrFail($request->holder_id);
        if($holder->dependents->count() >= 4){
            return redirect()->route('client.edit', $holder->client_id)->with('erro', 'Foi atingido o limite de 3 dependentes.');
        }
        $request->validate([
            "name" => "required",
            "email" => "required",
            "birth_date" => "required",
            "gender" => "required",
            "type" => "required",
            "holder_id" => "required",
        ]);
        Client::create($request->all());
        return redirect()->route('client.edit', $holder->client_id);
    }
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required",
            "birth_date" => "required",
            "gender" => "required",
            "type" => "required",
            "cpf" => "required|unique:holders",
            "place" => "required",
            "complement" => "",
            "number" => "",
            "district" => "required",
            "city" => "required",
            "state" => "required",
            "country" => "required",
            "workplace" => "",
            "home_phone" => "",
            "cell_phone" => "required",
            "work_phone" => "",
        ]);
        DB::beginTransaction();
        try{
            $request['type'] = 'Titular';
            $client = Client::create($request->all());
            $request['client_id'] = $client->id;
            $holder = Holder::create($request->all());
            $client->holder_id = $holder->id;
            $client->save();
            DB::commit();
        }catch(\Exception $e){
            return redirect()->route('client.index')->with('erro', 'Falha na inserção dos dados.');
            DB::rollback();
        }
        return redirect()->route('client.index');
    }
    public function edit($id)
    {
        $client = Client::with('holder.dependents')->where('id',$id)->first();
        $countries = Util::iso3166();
        $state = Holder::groupBy('state')->pluck('state');
        $city = Holder::groupBy('city')->pluck('city');
        $district = Holder::groupBy('district')->pluck('district');
        return view('client.form', compact('client','countries', 'state', 'city', 'district'));
    }
    public function dependent_edit($id)
    {
        $dependent = Client::findOrFail($id);
        return view('client.include.dependents_form', compact('dependent','id'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
            "email" => "required",
            "birth_date" => "required",
            "gender" => "required",
            "type" => "required",
            "cpf" => "required",
            "place" => "required",
            "complement" => "",
            "number" => "",
            "district" => "required",
            "city" => "required",
            "state" => "required",
            "country" => "required",
            "workplace" => "",
            "home_phone" => "",
            "cell_phone" => "required",
            "work_phone" => "",
        ]);
        DB::beginTransaction();
        try{
            $client = Client::findOrFail($id);
            $client->update($request->all());
            $holder = Holder::findOrFail($client->holder->id);
            $holder->update($request->all());
            DB::commit();
        }catch(\Exception $e){
            return redirect()->route('client.index')->with('erro', 'Falha na atualização dos dados.');
            DB::rollback();
        }
        return redirect()->route('client.index');
    }
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $holder = Holder::findOrfail($client->holder_id);
        DB::beginTransaction();
        try{
            if($client->type == "Titular"){
                $client->holder_id = null;
                $client->save();
                $holder->delete();
                $client->delete();
                $saida =  redirect()->route('client.index');
            }else{
                $client->delete();
                $saida = redirect()->route('client.edit', $holder->client_id);
            }
            DB::commit();
        }catch(\Exception $e){
            return redirect()->route('client.index')->with('erro', 'Falha na exlusão, este cliente possui vinculos ativos.');
            DB::rollback();
        }
        return $saida;

    }
    public function active(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $holder = Holder::findOrfail($client->holder_id);
        if(isset($request->active_field)){
            $holder->active = TRUE;
        }else{
            $holder->active = FALSE;
        }
        $holder->save();
        return redirect()->route('client.edit', $id);
    }
    public function identity($id)
    {
        $clients = Client::whereIn('id', json_decode($id))->get();
        return view('client.qrcode', compact('clients'));
    }
}
