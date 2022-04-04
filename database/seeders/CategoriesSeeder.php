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
                'parent_category_id' => 0
            ],
            [
                'name' => 'Full Stack',
                'parent_category_id' => 1
            ],
            [
                'name' => 'Back End',
                'parent_category_id' => 1
            ],
            [
                'name' => 'Front End',
                'parent_category_id' => 1
            ],
            [
                'name' => 'Voice Acting',
                'parent_category_id' => 0
            ],
            [
                'name' => 'Content Creator',
                'parent_category_id' => 0
            ]
        ];
        Category::insert(
            $arr
        );
    }
}
