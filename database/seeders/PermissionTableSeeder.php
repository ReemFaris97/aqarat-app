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
                'route_name'=>'admin.roles.index'
            ],
            [
                'name' => 'role-create',
                'guard_name' => 'admin',
                'title' => 'اضافة صلاحية',
                'route_name'=>'admin.roles.create'
            ],
            [
                'name' => 'role-edit',
                'guard_name' => 'admin',
                'title' => 'تعديل صلاحية',
                'route_name'=>'admin.roles.edit'
            ],
            [
                'name' => 'role-delete',
                'guard_name' => 'admin',
                'title' => 'حذف صلاحية',
                'route_name'=>'admin.roles.delete'
            ],
            [
                'name' => 'admin-list',
                'guard_name' => 'admin',
                'title' => 'قائمة اعضاء الإدارة',
                'route_name'=>'admin.admins.index'
            ],
            [
                'name' => 'admin-create',
                'guard_name' => 'admin',
                'title' => 'اضافة عضو إدارة',
                'route_name'=>'admin.admins.create'
            ],
            [
                'name' => 'admin-edit',
                'guard_name' => 'admin',
                'title' => 'تعديل عضو الإدارة',
                'route_name'=>'admin.admins.edit'
            ],
            [
                'name' => 'admin-delete',
                'guard_name' => 'admin',
                'title' => 'حذف اعضاء الإدارة',
                'route_name'=>'admin.admins.delete'
            ],
            [
                'name' => 'users-list',
                'guard_name' => 'admin',
                'title' => 'قائمة المستخدمين',
                'route_name'=>'admin.users.index'
            ],
            [
                'name' => 'users-create',
                'guard_name' => 'admin',
                'title' => 'اضافة مستخدم جديد',
                'route_name'=>'admin.users.create'
            ],
            [
                'name' => 'users-edit',
                'guard_name' => 'admin',
                'title' => 'تعديل المستخدم',
                'route_name'=>'admin.users.edit'
            ],
            [
                'name' => 'users-delete',
                'guard_name' => 'admin',
                'title' => 'حذف المستخدمين',
                'route_name'=>'admin.users.delete'
            ],
            [
                'name' => 'cities-list',
                'guard_name' => 'admin',
                'title' => 'قائمة المدن',
                'route_name'=>'admin.cities.index'
            ],
            [
                'name' => 'cities-create',
                'guard_name' => 'admin',
                'title' => 'اضافة المدن',
                'route_name'=>'admin.cities.create'
            ],
            [
                'name' => 'cities-edit',
                'guard_name' => 'admin',
                'title' => 'تعديل المدن',
                'route_name'=>'admin.cities.edit'
            ],
            [
                'name' => 'cities-delete',
                'guard_name' => 'admin',
                'title' => 'حذف المدن',
                'route_name'=>'admin.cities.delete'
            ], [
                'name' => 'neighborhoods-list',
                'guard_name' => 'admin',
                'title' => 'قائمة الأحياء',
                'route_name'=>'admin.neighborhoods.index'
            ],
            [
                'name' => 'neighborhoods-create',
                'guard_name' => 'admin',
                'title' => 'اضافة الأحياء',
                'route_name'=>'admin.neighborhoods.create'
            ],
            [
                'name' => 'neighborhoods-edit',
                'guard_name' => 'admin',
                'title' => 'تعديل الأحياء',
                'route_name'=>'admin.neighborhoods.edit'
            ],
            [
                'name' => 'neighborhoods-delete',
                'guard_name' => 'admin',
                'title' => 'حذف الأحياء',
                'route_name'=>'admin.neighborhoods.delete'
            ],
            [
                'name' => 'offers-list',
                'guard_name' => 'admin',
                'title' => 'قائمة العروض',
                'route_name'=>'admin.offers.index'
            ],
            [
                'name' => 'offers-edit',
                'guard_name' => 'admin',
                'title' => 'تعديل العروض',
                'route_name'=>'admin.offers.edit'
            ],
            [
                'name' => 'offers-delete',
                'guard_name' => 'admin',
                'title' => 'حذف العروض',
                'route_name'=>'admin.offers.delete'
            ],

            [
                'name' => 'requests-list',
                'guard_name' => 'admin',
                'title' => 'قائمة الطلبات',
                'route_name'=>'admin.requests.index'
            ],
            [
                'name' => 'requests-edit',
                'guard_name' => 'admin',
                'title' => 'تعديل الطلبات',
                'route_name'=>'admin.requests.edit'
            ],
            [
                'name' => 'requests-delete',
                'guard_name' => 'admin',
                'title' => 'حذف الطلبات',
                'route_name'=>'admin.requests.delete'
            ],

            [
                'name' => 'advertisings-list',
                'guard_name' => 'admin',
                'title' => 'قائمة الإعلانات',
                'route_name'=>'admin.advertisings.index'
            ],
            [
                'name' => 'advertisings-create',
                'guard_name' => 'admin',
                'title' => 'اضافة الإعلانات',
                'route_name'=>'admin.advertisings.create'
            ],
            [
                'name' => 'advertisings-edit',
                'guard_name' => 'admin',
                'title' => 'تعديل الإعلانات',
                'route_name'=>'admin.advertisings.edit'
            ],
            [
                'name' => 'advertisings-delete',
                'guard_name' => 'admin',
                'title' => 'حذف الإعلانات',
                'route_name'=>'admin.advertisings.delete'
            ], [
                'name' => 'blogs-list',
                'guard_name' => 'admin',
                'title' => 'قائمة المدونات',
                'route_name'=>'admin.blogs.index'
            ],
            [
                'name' => 'blogs-create',
                'guard_name' => 'admin',
                'title' => 'اضافة المدونات',
                'route_name'=>'admin.blogs.create'
            ],
            [
                'name' => 'blogs-edit',
                'guard_name' => 'admin',
                'title' => 'تعديل المدونات',
                'route_name'=>'admin.blogs.edit'
            ],
            [
                'name' => 'blogs-delete',
                'guard_name' => 'admin',
                'title' => 'حذف المدونات',
                'route_name'=>'admin.blogs.index'
            ], [
                'name' => 'commonQuestions-list',
                'guard_name' => 'admin',
                'title' => 'قائمة الأسئلة الشائعة',
                'route_name'=>'admin.commonQuestions.index'
            ],
            [
                'name' => 'commonQuestions-create',
                'guard_name' => 'admin',
                'title' => 'اضافة  الأسئلة الشائعة',
                'route_name'=>'admin.commonQuestions.create'
            ],
            [
                'name' => 'commonQuestions-edit',
                'guard_name' => 'admin',
                'title' => 'تعديل الأسئلة الشائعة',
                'route_name'=>'admin.commonQuestions.edite'
            ],
            [
                'name' => 'commonQuestions-delete',
                'guard_name' => 'admin',
                'title' => 'حذف الأسئلة الشائعة',
                'route_name'=>'admin.commonQuestions.delete'
            ],
            [
                'name' => 'contact-list',
                'guard_name' => 'admin',
                'title' => 'قائمة اتصل بنا',
                'route_name'=>'admin.contacts.index'
            ], [
                'name' => 'contact-delete',
                'guard_name' => 'admin',
                'title' => 'حذف البريد',
                'route_name'=>'admin.contacts.delete'
            ],
            [
                'name' => 'setting-list',
                'guard_name' => 'admin',
                'title' => 'قائمة الإعدادات',
                'route_name'=>'admin.settings.index'
            ],


        ];

        foreach ($permissions as $permission) {

            Permission::create($permission);

        }


    }
}
