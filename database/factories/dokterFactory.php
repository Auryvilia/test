<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\dokter>
 */
class dokterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_dokter' => $this->faker->numberBetween(1, 10),
            'nama_dokter' => $this->faker->name(),
            'spesialis' => $this->faker->word(),
            
        ];
    }
}
