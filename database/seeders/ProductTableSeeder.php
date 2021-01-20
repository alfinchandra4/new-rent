<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'product_code' => 'BBR01',
                'product_name' => 'Baby Roller 01',
                'product_status' => 1,
                'category_id' => 1,
            ],
            [
                'product_code' => 'BBR02',
                'product_name' => 'Baby Roller 02',
                'product_status' => 1,
                'category_id' => 1,
            ],
            [
                'product_code' => 'MLN01',
                'product_name' => 'Moln Aduk 01',
                'product_status' => 1,
                'category_id' => 2,
            ],
            [
                'product_code' => 'MLN03',
                'product_name' => 'Moln Aduk 03',
                'product_status' => 1,
                'category_id' => 2,
            ],
            [
                'product_code' => 'STPKD01',
                'product_name' => 'Stamper Kuda 01',
                'product_status' => 1,
                'category_id' => 3,
            ]
        ];
        foreach ($products as $key => $value) {
            Product::create([
                'product_code' => $value['product_code'],
                'product_name' => $value['product_name'],
                'product_status' => $value['product_status'],
                'category_id' => $value['category_id'],
            ]);
        }
    }
}
