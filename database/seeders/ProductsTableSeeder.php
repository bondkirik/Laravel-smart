<?php

namespace Database\Seeders;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
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
                'id' => 1,
                'name' => 'Front end developer',
                'code' => 'front_end_developer',
                'category_id' => 1,
                'description' => 'Front end developer for project ',
                'price' => 3000,
                'count' => rand(1, 10),
            ],
            [
                'id' => 2,
                'name' => 'Blog',
                'code' => 'blog',
                'category_id' => 2,
                'description' => 'Blog for business',
                'price' => 1800,
                'count' => rand(1, 10),
            ],
            [
                'id' => 3,
                'name' => 'Wordpress plugin',
                'code' => 'wordpress_plugin',
                'category_id' => 3,
                'description' => 'Plugin for Wordpress',
                'price' => 500,
                'count' => rand(1, 10),
            ],
        ];
//        DB::table('products')->delete();
        foreach ($products as $product) {
            if (!Product::find($product['id'])) {
                $product['created_at'] = Carbon::now();
                $product['updated_at'] = Carbon::now();
                DB::table('products')->updateOrInsert($product);
            }
        }

    }
}
