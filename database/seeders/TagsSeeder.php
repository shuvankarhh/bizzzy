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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Urgent',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Opportunity',
                'created_at' => now(),
                'updated_at' => now(),
            ],  
        ];
        Tag::insert(
            $arr
        );
    }
}
