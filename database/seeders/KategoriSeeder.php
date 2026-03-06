<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategoris')->insert([
            ['product_id' => 1, 'name' => 'Elektronik', 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 2, 'name' => 'Elektronik', 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 3, 'name' => 'Pakaian', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
