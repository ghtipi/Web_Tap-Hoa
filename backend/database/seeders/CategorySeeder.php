<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'name' => 'Apple'
        ]);
        DB::table('categories')->insert([
            'name' => 'Samsung'
        ]);
        DB::table('categories')->insert([
            'name' => 'Điện thoại'
        ]);
        DB::table('categories')->insert([
            'name' => 'Tablet'
        ]);
        DB::table('categories')->insert([
            'name' => 'Macbook'
        ]);
        DB::table('categories')->insert([
            'name' => 'Laptop'
        ]);
        DB::table('categories')->insert([
            'name' => 'Phụ kiện'
        ]);
    }
}
