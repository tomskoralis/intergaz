<?php

namespace Database\Factories;

use App\Models\Delivery;
use App\Models\Route;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'route_id' => Route::inRandomOrder()->limit(1)->get()->first()->id,
            'type' => mt_rand(1, 2),
            'status' => mt_rand(1, 3),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Delivery $delivery) {
            $deliveryDate = $delivery->route()->get()->value('date');
            if (
                $delivery->status === 2 &&
                now()->lt($deliveryDate)
            ) {
                $delivery->fill([
                    'status' => 1
                ])->save();
            }

            if (
                $delivery->status === 1 &&
                now()->gt($deliveryDate)
            ) {
                $delivery->fill([
                    'status' => 2
                ])->save();
            }
        });
    }
}
