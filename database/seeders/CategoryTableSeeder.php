<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
               $categories = [
           [
            'cat_code' => 'BBROLLER',
            'cat_name' => 'BABY ROLLER'
           ],
           [
            'cat_code' => 'MOLN',
            'cat_name' => 'MOLN'
           ],
           [
            'cat_code' => 'STPKA',
            'cat_name' => 'STAMPER KUDA'
           ]
       ];

       foreach ($categories as $key => $value) {
           Category::create([
               'cat_code' => $value['cat_code'],
               'cat_name' => $value['cat_name']
           ]);
       }
    }
}
