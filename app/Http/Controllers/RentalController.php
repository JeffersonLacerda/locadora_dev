<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RentalController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'can:customer_service']);
    }

    public function index()
    {
        return view('rental.index');
    }
}
