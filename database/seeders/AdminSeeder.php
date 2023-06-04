<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Email;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $email = Email::create(['email' => 'admin@gmail.com']);
        Admin::create([
            'name' => 'Admin',
            'user_name' => 'Admin',
            'account_email_id' => $email->id,
            'password' => bcrypt('siteadmin'),
            'acting_status' => 1,
        ]);
    }
}
