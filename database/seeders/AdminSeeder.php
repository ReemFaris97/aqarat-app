<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('admins')->delete();

        $admins = [
            [
                'name' => 'admin',
                'phone' => '0112287909',
                'email' => 'admin@admin.com',
                'password' => '123456',
            ],

        ];

        foreach ($admins as $item) {
          $admin=  \App\Models\Admin::create($item);
          $admin->assignRole(Role::where('name','Super Admin')->first());
        }
    }
}
