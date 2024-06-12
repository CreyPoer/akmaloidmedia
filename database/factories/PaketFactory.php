<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paket>
 */
class PaketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kategori_produk_id' => $this->faker->numberBetween(1, 3),
            'penerbit_id' => $this->faker->numberBetween(1, 10),
            'periode_id' => $this->faker->numberBetween(1, 4),
            'name' => $this->faker->word,
            'waktu_pengiriman' => $this->faker->randomElement(['Pagi', 'Siang', 'Sore']),
            'harga_paket' => $this->faker->numberBetween(10000, 100000),
            'deskripsi' => $this->faker->sentence,
            'gambar' =>  $this->faker->imageUrl(640, 480, 'people', true, 'Faker'),
        ];
    }
}
