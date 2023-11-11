<?php

namespace Database\Factories;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Makanan>
 */
class MakananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'nama' => fake()->name(),
            'harga' => fake()->numberBetween(1000,5000),
            'stock' => fake()->numberBetween(1000,4000),
            'gambar' => fake()->name(),
            'id_menu' => Menu::all()->random()->id,
            ];
    }
}
