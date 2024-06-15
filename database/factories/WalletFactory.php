<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wallet>
 */
class WalletFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'e_wallet' => $this->faker->company, // Misalnya, nama e-wallet
            'nama_rek' => $this->faker->name,
            'no_rek' => $this->faker->bankAccountNumber,
            'gambar' => $this->faker->imageUrl(640, 480, 'business'), // Gambar acak
        ];
    }
}
