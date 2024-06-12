<?php

namespace Database\Factories;

use App\Models\SlideShow;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SlideShow>
 */
class SlideShowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = SlideShow::class;

    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence,
            'sub_judul' => $this->faker->sentence,
            'deskripsi' => $this->faker->paragraph,
            'button' => $this->faker->word,
            'icon' => $this->faker->imageUrl($width = 50, $height = 50, 'technics', true, 'icon', true, 'png'),
            'gambar' => $this->faker->imageUrl($width = 640, $height = 480, 'nature', true, 'image', false, 'jpg')
        ];
    }
}
