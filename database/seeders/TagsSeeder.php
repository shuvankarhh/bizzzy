<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr =[            
            [
                'name' => 'Featured Jobs',
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'name' => 'Urgent',
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'name' => 'Opportunity',
                'createdAt' => now(),
                'updatedAt' => now(),
            ],  
        ];
        Tag::insert(
            $arr
        );
    }
}
