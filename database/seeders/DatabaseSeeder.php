<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Address;
use App\Models\Client;
use App\Models\Delivery;
use App\Models\DeliveryLine;
use App\Models\Route;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Route::factory(50)->create();

        collect(range(0, 30))
            ->each(function () {
                Client::factory()
                    ->has(Address::factory(mt_rand(0, 3))
                        ->has(Delivery::factory(mt_rand(0, 3))
                            ->has(DeliveryLine::factory(mt_rand(1, 4))))
                    )->create();
            });
    }
}
