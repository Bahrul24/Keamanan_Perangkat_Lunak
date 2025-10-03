<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Produk 1',
                'description' => 'High-quality mountain bike for rugged terrain.',
                'price' => 500.00,
                'image' => 'images/bimoli.png', // Simpan gambar di folder public/images atau storage
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Produk 2',
                'description' => 'Lightweight bike for long-distance road cycling.',
                'price' => 700.00,
                'image' => 'images/aqua.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Produk 3',
                'description' => 'Comfortable bike designed for city commuting.',
                'price' => 300.00,
                'image' => 'images/indomie.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
