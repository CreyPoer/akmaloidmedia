<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\KategoriProduk::factory(3)->create();
        \App\Models\Penerbit::factory(10)->create();
        \App\Models\Periode::factory(4)->create();
        \App\Models\SlideShow::factory(5)->create();
        \App\Models\Wallet::factory()->count(5)->create();

        $this->call([
            PaketSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
