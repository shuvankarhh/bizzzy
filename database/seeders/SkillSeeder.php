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
                'name' => 'Web Development',
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'name' => 'HTML',
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'name' => 'CSS',
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'name' => 'Javascript',
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'name' => 'Laravel',
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'name' => 'Vue',
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'name' => 'Python',
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'name' => 'Time Management',
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'name' => 'Risk assesment',
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'name' => 'Leadership',
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
        ];
        Skill::insert(
            $arr
        );
    }
}
