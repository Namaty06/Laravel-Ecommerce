<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=> $this->faker->title,
            'description'=>$this->faker->paragraph(),
            'price'=> $this->faker->numberBetween(99,9999),
            'image'=>$this->faker->imageUrl(640,480),
            'stock'=>$this->faker->numberBetween(1,50),
            'category_id'=>$this->faker->numberBetween(1,10)

        ];
    }
}
