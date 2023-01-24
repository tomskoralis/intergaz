<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryLineFactory extends Factory
{
    public function definition(): array
    {
        return [
            'item' => 'Item' . mt_rand(1, 99),
            'price' => fake()->randomFloat(2, 0.01, 5),
            'qty' => fake()->randomFloat(8, 1, 100),
        ];
    }
}
