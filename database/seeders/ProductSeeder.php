<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ['user_id' => 1, 'name' => 'Laptop', 'price' => 10000000, 'qty' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 1, 'name' => 'Mouse', 'price' => 150000, 'qty' => 50, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 1, 'name' => 'Kaos Polos', 'price' => 50000, 'qty' => 100, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
