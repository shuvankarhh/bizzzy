<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [
            [
                'name' => 'Web Development',
                'parent_category_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Full Stack',
                'parent_category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Back End',
                'parent_category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Front End',
                'parent_category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Voice Acting',
                'parent_category_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Content Creator',
                'parent_category_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];
        Category::insert(
            $arr
        );
    }
}
