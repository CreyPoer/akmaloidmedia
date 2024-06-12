<?php

namespace Database\Seeders;

use App\Models\Paket;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Paket::create([
                'kategori_produk_id' => $faker->numberBetween(1, 3),
                'penerbit_id' => $faker->numberBetween(1, 10),
                'periode_id' => $faker->numberBetween(1, 4),
                'name' => $faker->word,
                'waktu_pengiriman' => $faker->randomElement(['Pagi', 'Siang', 'Sore']),
                'harga_paket' => $faker->numberBetween(10000, 100000),
                'deskripsi' => $faker->sentence,
                'gambar' =>  $faker->imageUrl(640, 480, 'newspaper', true, 'Faker'),
            ]);
        }
    }
}
