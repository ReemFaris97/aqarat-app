<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'admin',
                'phone' => '0112287909',
                'email' => 'user@user.com',
                'password' => '123456',
                'status'=>1
            ],

        ];

        foreach ($users as $item) {
            \App\Models\User::create($item);
        }
    }
}
