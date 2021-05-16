<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product'=> $this->faker->title,   
            'price'=> $this->faker->numberBetween(99,9999),
            'quantity'=>$this->faker->numberBetween(1,10),
            'user_id'=>$this->faker->numberBetween(1,10)
        ];
    }
}
