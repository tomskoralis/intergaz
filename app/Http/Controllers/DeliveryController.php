<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class DeliveryController extends Controller
{
    private const RECENT_COUNT = 10;

    public function show(Request $request): View
    {
        $client = Client::findOrFail($request->id);
        $addresses = $client->addresses();
        $deliveries = new Collection();
        foreach ($addresses->get() as $address) {
            foreach ($address->deliveries()->get() as $delivery) {
                $deliveries->add($delivery);
            }
        }
        $client = $client->where('id', $request->id)->get();
        return view('deliveries', [
            'client' => $client,
            'deliveries' => $deliveries,
        ]);
    }

    public function recent(): View
    {
        $deliveries = Delivery::where('status', 2)->get()->sortByDesc(function ($delivery) {
                return $delivery->date;
            })->slice(0, self::RECENT_COUNT);

        return view('deliveries-recent', [
            'count' => self::RECENT_COUNT,
            'deliveries' => $deliveries,
        ]);
    }
}
