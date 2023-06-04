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
                'acting_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'HTML',
                'acting_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'CSS',
                'acting_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Javascript',
                'acting_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Laravel',
                'acting_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vue',
                'acting_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Python',
                'acting_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Time Management',
                'acting_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Risk assesment',
                'acting_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Leadership',
                'acting_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        Skill::insert(
            $arr
        );
    }
}
