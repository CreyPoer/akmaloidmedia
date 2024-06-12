<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penerbit>
 */
class PenerbitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'alamat' => $this->faker->address,
            'deskripsi' => $this->faker->paragraph,
            'logo' => $this->faker->imageUrl(640, 480, 'people', true, 'Faker'),
        ];
    }
}
