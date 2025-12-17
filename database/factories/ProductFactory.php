<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $arepas = [
            'Arepa de queso',
            'Arepa de pollo',
            'Arepa de carne',
            'Arepa sin nada',
            'Arepa vegana',
            'Arepa ibaiox',
        ];

        return [
            'name' => fake()->randomElement($arepas),
            'description' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 1, 100),
            'image' => fake()->numberBetween(1, 2).'.jpg',
            'user_id' => 1,
        ];
    }
}
