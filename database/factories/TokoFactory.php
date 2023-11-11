<?php

namespace Database\Factories;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Toko>
 */
class TokoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_toko' => fake()->name(),
            'email' => fake()->name(),
            'deskripsi_toko' => fake()->name(),
            'id_user' => User::all()->random()->id,
            'gambar' => fake()->name(),
        ];
    }
}
