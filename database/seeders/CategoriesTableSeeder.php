<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
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
        $categories = [
            [
                'id' => 1,
                'name' => 'Developers',
                'code' => 'developers',
                'description' => 'developers description for business'
            ],
            [
                'id' => 2,
                'name' => 'Projects',
                'code' => 'projects',
                'description' => 'project description'
            ],
            [
                'id' => 3,
                'name' => 'Plugins',
                'code' => 'plugins',
                'description' => 'CMS plugins description'
            ],
        ];
        DB::table('categories')->delete();
        foreach ($categories as $category) {
            if (!Category::find($category['id'])) {
                $category['created_at'] = Carbon::now();
                $category['updated_at'] = Carbon::now();
                DB::table('categories')->updateOrInsert($category);
            }
        }
    }
}
