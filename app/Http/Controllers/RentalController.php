<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Item;
use App\Services\Util;
use Carbon\Carbon;

class RentalController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'can:customer_service']);
    }

    public function rental_client()
    {
        $clients = Client::with('holder')->whereHas('holder', function ($query){
            $query->where('active', true);
        })->get();
        return view('rental.select_client', compact('clients'));
    }

    public function rental_items(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'client_id' => 'required_if:type,id|exists:clients,id',
            'client_qrcode' => 'required_if:type,qrcode|exists:clients,id',
        ]);
        $id = (isset($request->client_qrcode)) ? $request->client_qrcode : $request->client_id;
        $items = Item::with('movie', 'media')->where('status', 'Disponível')->get();
        $client = Client::with('holder')->whereHas('holder', function ($query){
            $query->where('active', true);
        })->where('id', $id)->first();
        if (isset($request->client_qrcode)){
            $client_qrcode = $request->client_qrcode;
            return view('rental.add_items', compact('client_qrcode', 'items', 'client'));
        }
        return view('rental.add_items', compact('items', 'client'));
    }

    public function return_date($days){
        return Util::return_date($days);
    }

    public function rental_add_item_qrcode($id)
    {
        $id_media = substr($id, 0, 2) * 1;
        $id_movie = substr($id, 2, 8) * 1;
        $items = Item::with('movie.type', 'media')
            ->where('media_id', $id_media)
            ->where('movie_id', $id_movie);
        $exists = ($items->count() > 0) ? true : false;
        $item = $items->where('status', 'Disponível')->first();
        $response = array();
        if ( !$exists ){
            $response['status'] = 'Not Found';
        } elseif (is_null($item)){
            $response['status'] = 'Unavailable';
        } else {
            $response['status'] = 'Available';
        }
        
        $data = array();
        if ($item != null) {
            $data['id'] = $item->id;
            $data['title'] = $item->movie->title;
            $data['type'] = $item->movie->type->description;
            $data['media'] = $item->media->description;
            $data['price'] = $item->media->rental_price * (1 + $item->movie->type->increase);
            $data['discount'] = 0;
            $data['return_deadline'] = $item->movie->type->return_deadline;
            $data['return_deadline_extension'] = 0;
            $data['return_date'] = Util::return_date($item->movie->type->return_deadline);
        } 
        $response['data'] = $data;
        return json_encode($response);

    }

}
