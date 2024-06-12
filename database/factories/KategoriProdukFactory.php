<?php

namespace Database\Factories;

use App\Models\KategoriProduk;
use Illuminate\Database\Eloquent\Factories\Factory;

class KategoriProdukFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = KategoriProduk::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Koran', 'Majalah', 'Tabloid']),
            'deskripsi' => $this->faker->paragraph,
            'foto' => $this->faker->imageUrl(640, 480, 'people', true, 'Faker'),

        ];
    }
}
