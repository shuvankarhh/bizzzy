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
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'name' => 'Full Stack',
                'parent_category_id' => 1,
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'name' => 'Back End',
                'parent_category_id' => 1,
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'name' => 'Front End',
                'parent_category_id' => 1,
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'name' => 'Voice Acting',
                'parent_category_id' => 0,
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'name' => 'Content Creator',
                'parent_category_id' => 0,
                'createdAt' => now(),
                'updatedAt' => now(),
            ]
        ];
        Category::insert(
            $arr
        );
    }
}
