<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
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
                'name' => 'Web Development'
            ],
            [
                'name' => 'HTML'
            ],
            [
                'name' => 'CSS'
            ],
            [
                'name' => 'Javascript'
            ],
            [
                'name' => 'Laravel'
            ],
            [
                'name' => 'Vue'
            ],
            [
                'name' => 'Python'
            ],
            [
                'name' => 'Time Management'
            ],
            [
                'name' => 'Risk assesment'
            ],
            [
                'name' => 'Leadership'
            ],
        ];
        Skill::insert(
            $arr
        );
    }
}
