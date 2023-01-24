<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AddressController extends Controller
{
    public function show(Request $request): JsonResponse
    {
        $addressesCollection = Address::where('client_id', $request->client_id)->get();

        if ($addressesCollection->isEmpty()) {
            $addresses = '<p>No addresses found!</p>';
        } else {
            $addresses = '<ul>';
            foreach ($addressesCollection as $address) {
                $addresses .= '<li>' . str_replace("\n", ', ', $address->title) . '</li>';
            }
            $addresses .= '</ul>';
        }

        return response()->json([
            'addresses' => $addresses
        ]);
    }

    public function index(): View
    {
        $addressIds = DB::table('addresses')
            ->join('deliveries as deliveries1', function ($join) {
                $join->on('addresses.id', '=', 'deliveries1.address_id')
                    ->where([
                        ['deliveries1.type', '=', 1],
                        ['deliveries1.status', '=', 2],
                    ]);
            })
            ->join('deliveries as deliveries2', function ($join) {
                $join->on('addresses.id', '=', 'deliveries2.address_id')
                    ->where([
                        ['deliveries2.type', '=', 2],
                        ['deliveries2.status', '=', 2],
                    ]);
            })
            ->select('addresses.id')
            ->get()
            ->map(function ($value) {
                return $value->id;
            })
            ->toArray();

        $addresses = Address::whereIn('id', $addressIds)->get();

        return view('delivery-types', [
            'addresses' => $addresses,
        ]);
    }
}
