<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            [
                'name' => 'role-list',
                'guard_name' => 'admin',
                'title' => 'قائمة الصلاحيات',
            ],
            [
                'name' => 'role-create',
                'guard_name' => 'admin',
                'title' => 'اضافة صلاحية',
            ],
            [
                'name' => 'role-edit',
                'guard_name' => 'admin',
                'title' => 'تعديل صلاحية',
            ],
            [
                'name' => 'role-delete',
                'guard_name' => 'admin',
                'title' => 'حذف صلاحية',
            ],
            [
                'name' => 'admin-list',
                'guard_name' => 'admin',
                'title' => 'قائمة اعضاء الإدارة',
            ],
            [
                'name' => 'admin-create',
                'guard_name' => 'admin',
                'title' => 'اضافة عضو إدارة',
            ],
            [
                'name' => 'admin-edit',
                'guard_name' => 'admin',
                'title' => 'تعديل عضو الإدارة',
            ],
            [
                'name' => 'admin-delete',
                'guard_name' => 'admin',
                'title' => 'حذف اعضاء الإدارة',
            ],
            [
                'name' => 'users-list',
                'guard_name' => 'admin',
                'title' => 'قائمة المستخدمين',
            ],
            [
                'name' => 'users-create',
                'guard_name' => 'admin',
                'title' => 'اضافة مستخدم جديد',
            ],
            [
                'name' => 'users-edit',
                'guard_name' => 'admin',
                'title' => 'تعديل المستخدم',
            ],
            [
                'name' => 'users-delete',
                'guard_name' => 'admin',
                'title' => 'حذف المستخدمين',
            ],
            [
                'name' => 'categories-list',
                'guard_name' => 'admin',
                'title' => 'قائمة الأقسام',
            ],
            [
                'name' => 'categories-create',
                'guard_name' => 'admin',
                'title' => 'اضافة الأقسام',
            ],
            [
                'name' => 'categories-edit',
                'guard_name' => 'admin',
                'title' => 'تعديل الأقسام',
            ],
            [
                'name' => 'categories-delete',
                'guard_name' => 'admin',
                'title' => 'حذف الأقسام',
            ],
            [
                'name' => 'posts-list',
                'guard_name' => 'admin',
                'title' => 'قائمة المنشورات',
            ],
            [
                'name' => 'posts-delete',
                'guard_name' => 'admin',
                'title' => 'حذف المنشورات',
            ], [
                'name' => 'posts-report',
                'guard_name' => 'admin',
                'title' => 'بلاغات المنشورات',
            ], [
                'name' => 'comment-report',
                'guard_name' => 'admin',
                'title' => 'بلاغات التعليقات',
            ], [
                'name' => 'contact-list',
                'guard_name' => 'admin',
                'title' => 'قائمة اتصل بنا',
            ], [
                'name' => 'contact-delete',
                'guard_name' => 'admin',
                'title' => 'حذف البريد',
            ],
            [
                'name' => 'setting-list',
                'guard_name' => 'admin',
                'title' => 'قائمة الإعدادات',
            ],


        ];

        foreach ($permissions as $permission) {

            Permission::create($permission);

        }


    }
}
