<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\pasien>
 */
class pasienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_pasien' => $this->faker->numberBetween(1, 10),
            'nama_pasien' => $this->faker->name(),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'status' => $this->faker->word(),
            'alamat' => $this->faker->address(),
            'created_at' => now(),
            'updated_at' => now(),
            
        ];
    }
}
