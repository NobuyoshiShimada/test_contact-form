<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['category_name' => '1.商品のお届けについて'],
            ['category_name' => '2.商品の交換について'],
            ['category_name' => '3.商品トラブル'],
            ['category_name' => '4.ショップへのお問い合わせ'],
            ['category_name' => '5.その他'],
        ]);

    }
}
