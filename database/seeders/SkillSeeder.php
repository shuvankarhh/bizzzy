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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'HTML',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'CSS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Javascript',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Laravel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vue',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Python',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Time Management',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Risk assesment',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Leadership',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        Skill::insert(
            $arr
        );
    }
}
