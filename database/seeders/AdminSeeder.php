<?php

namespace Database\Seeders;

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
        $admins = [
            [
                'name' => 'admin',
                'phone' => '0112287909',
                'email' => 'admin@admin.com',
                'password' => '123456',
                'status'=>1
            ],

        ];

        foreach ($admins as $item) {
            \App\Models\Admin::create($item);
        }
    }
}
