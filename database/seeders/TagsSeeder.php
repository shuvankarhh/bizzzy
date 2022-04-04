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
            ],
            [
                'name' => 'Urgent',
            ],
            [
                'name' => 'Opportunity',
            ],  
        ];
        Tag::insert(
            $arr
        );
    }
}
