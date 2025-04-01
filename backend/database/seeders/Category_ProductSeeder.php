<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Category_ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category_product')->insert([
            'category_id' => 1,
            'product_id' => 1
        ]);
        DB::table('category_product')->insert([
            'category_id' => 1,
            'product_id' => 2
        ]);
        DB::table('category_product')->insert([
            'category_id' => 1,
            'product_id' => 3
        ]);
        DB::table('category_product')->insert([
            'category_id' => 1,
            'product_id' => 4
        ]);
        DB::table('category_product')->insert([
            'category_id' => 1,
            'product_id' => 5
        ]);
        DB::table('category_product')->insert([
            'category_id' => 1,
            'product_id' => 8
        ]);
        DB::table('category_product')->insert([
            'category_id' => 1,
            'product_id' => 9
        ]);
        DB::table('category_product')->insert([
            'category_id' => 1,
            'product_id' => 11
        ]);
        DB::table('category_product')->insert([
            'category_id' => 1,
            'product_id' => 12
        ]);
        DB::table('category_product')->insert([
            'category_id' => 2,
            'product_id' => 6
        ]);
        DB::table('category_product')->insert([
            'category_id' => 2,
            'product_id' => 7
        ]);
        DB::table('category_product')->insert([
            'category_id' => 3,
            'product_id' => 1
        ]);
        DB::table('category_product')->insert([
            'category_id' => 3,
            'product_id' => 2
        ]);
        DB::table('category_product')->insert([
            'category_id' => 3,
            'product_id' => 3
        ]);
        DB::table('category_product')->insert([
            'category_id' => 3,
            'product_id' => 4
        ]);
        DB::table('category_product')->insert([
            'category_id' => 3,
            'product_id' => 5
        ]);
        DB::table('category_product')->insert([
            'category_id' => 3,
            'product_id' => 6
        ]);
        DB::table('category_product')->insert([
            'category_id' => 3,
            'product_id' => 7
        ]);
        DB::table('category_product')->insert([
            'category_id' => 4,
            'product_id' => 8
        ]);
        DB::table('category_product')->insert([
            'category_id' => 4,
            'product_id' => 9
        ]);
        DB::table('category_product')->insert([
            'category_id' => 4,
            'product_id' => 10
        ]);
        DB::table('category_product')->insert([
            'category_id' => 5,
            'product_id' => 11
        ]);
        DB::table('category_product')->insert([
            'category_id' => 5,
            'product_id' => 12
        ]);
        DB::table('category_product')->insert([
            'category_id' => 6,
            'product_id' => 13
        ]);
        DB::table('category_product')->insert([
            'category_id' => 7,
            'product_id' => 14
        ]);
    }
}