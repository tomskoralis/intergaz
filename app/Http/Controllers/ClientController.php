<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Client;
use App\Models\Delivery;
use Illuminate\View\View;

class ClientController extends Controller
{
    public function index(): View
    {
        $clients = Client::all();
        return view('clients', [
            'clients' => $clients
        ]);
    }

    public function inactive(): View
    {
        $addresses = Address::whereNotIn(
            'id',
            Delivery::where('type', 1)
                ->whereNot('status', 2)
                ->get()
                ->pluck('address_id')
                ->toArray()
        )->get();

        return view('clients-inactive', [
            'addresses' => $addresses
        ]);
    }
}
