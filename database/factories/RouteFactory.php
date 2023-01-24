<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RouteFactory extends Factory
{
    public function definition(): array
    {
        return [
            'date' => now()->addDays(mt_rand(-365, 365)),
            'car_number' => $this->licensePlate(),
            'status' => mt_rand(1, 3),
            'driver_name' => fake()->name(),
        ];
    }

    private function licensePlate(): string
    {
        $letterAmount = mt_rand(1, 2);
        $letters = '';
        for ($i = 1; $i <= $letterAmount; $i++) {
            $letters .= chr(rand(65, 90));
        }
        return $letters . '-' . mt_rand(1, 9999);
    }
}
