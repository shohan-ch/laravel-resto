<?php

namespace Database\Factories;

use App\Models\DeliveryFee;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryFeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DeliveryFee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quantity' => $this->faker->numberBetween($min = 1, $max = 5),
            'charges'  => $this->faker->randomFloat(2, 0, 5),
        ];
    }
}