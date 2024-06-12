<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Periode>
 */
class PeriodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'periode' => $this->faker->randomElement(['Harian','Mingguan','Setengah Bulan','Bulan']),
            'deskripsi' => $this->faker->sentence(),
        ];
    }
}
