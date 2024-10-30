<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\administrasi>
 */
class administrasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tanggal' => $this->faker->date(),
            'pasien_id' => $this->faker->numberBetween(1, 10),
            'dokter_id' => $this->faker->numberBetween(1, 10),
            'biaya' => $this->faker->numberBetween(100000, 1000000),
        ];
    }
}
