<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'about',
                'type' => 'long_text',
                'ar_value' => 'balbalbalb',
                'en_value' => 'balablabal',
                'page' => 'النصوص',
                'slug' => 'text',
                'title' => 'من نحن',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'frequency_questions',
                'type' => 'long_text',
                'ar_value' => 'faq balbalbalbal',
                'en_value' => 'faq balbalbalbal',
                'page' => 'النصوص',
                'slug' => 'text',
                'title' => 'الاسئلة الشائعة',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'privacy',
                'type' => 'long_text',
                'ar_value' => 'privacy blabal',
                'en_value' => 'privacy balbala',
                'page' => 'النصوص',
                'slug' => 'text',
                'title' => 'الخصوصية',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'email',
                'type' => 'text',
                'ar_value' => 'test@test.com1',
                'en_value' => 'test@test.com1',
                'page' => 'حسابات التواصل',
                'slug' => 'socials',
                'title' => 'البريد الالكتروني',
                'created_at' => NULL,
                'updated_at' => '2021-08-05 15:03:29',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'phone',
                'type' => 'text',
                'ar_value' => '01010100101',
                'en_value' => '01010100101',
                'page' => 'حسابات التواصل',
                'slug' => 'socials',
                'title' => 'رقم الهاتف',
                'created_at' => NULL,
                'updated_at' => '2021-08-05 15:03:29',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'facebook',
                'type' => 'text',
                'ar_value' => '01010100101',
                'en_value' => '01010100101',
                'page' => 'حسابات التواصل',
                'slug' => 'socials',
                'title' => 'حساب الفيسبوك',
                'created_at' => NULL,
                'updated_at' => '2021-08-05 15:03:29',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'twitter',
                'type' => 'text',
                'ar_value' => '01010100101',
                'en_value' => '01010100101',
                'page' => 'حسابات التواصل',
                'slug' => 'socials',
                'title' => 'حساب تويتر',
                'created_at' => NULL,
                'updated_at' => '2021-08-05 15:03:29',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'snapchat',
                'type' => 'text',
                'ar_value' => '01010100101',
                'en_value' => '01010100101',
                'page' => 'حسابات التواصل',
                'slug' => 'socials',
                'title' => 'حساب سناب شات',
                'created_at' => NULL,
                'updated_at' => '2021-08-05 15:03:29',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'add-advertisement',
                'type' => 'long_text',
                'ar_value' => 'privacy blabal',
                'en_value' => 'privacy balbala',
                'page' => 'النصوص',
                'slug' => 'text',
                'title' => 'شروط اضافة اعلان',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'add-request',
                'type' => 'long_text',
                'ar_value' => 'privacy blabal',
                'en_value' => 'privacy balbala',
                'page' => 'النصوص',
                'slug' => 'text',
                'title' => 'شروط اضافة طلب',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'add-offer',
                'type' => 'long_text',
                'ar_value' => 'privacy blabal',
                'en_value' => 'privacy balbala',
                'page' => 'النصوص',
                'slug' => 'text',
                'title' => 'شروط اضافة عرض',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'special_ad',
                'type' => 'long_text',
                'ar_value' => 'special_ad',
                'en_value' => 'special_ad',
                'page' => 'النصوص',
                'slug' => 'text',
                'title' => 'شروط اضافة اعلان مميز',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'special_price',
                'type' => 'number',
                'ar_value' => '10',
                'en_value' => '10',
                'page' => 'الماليات',
                'slug' => 'finance',
                'title' => 'سعر اشتراك تميز الاعلان الشهري',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'title-splash-1',
                'type' => 'long_text',
                'ar_value' => 'balbalbalb',
                'en_value' => 'balablabal',
                'page' => 'النصوص',
                'slug' => 'text',
                'title' => 'عنوان البداية الاول',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'title-splash-2',
                'type' => 'long_text',
                'ar_value' => 'balbalbalb',
                'en_value' => 'balablabal',
                'page' => 'النصوص',
                'slug' => 'text',
                'title' => 'عنوان البداية الثاني',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'title-splash-3',
                'type' => 'long_text',
                'ar_value' => 'balbalbalb',
                'en_value' => 'balablabal',
                'page' => 'النصوص',
                'slug' => 'text',
                'title' => 'عنوان البداية الثالث',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'text-splash-1',
                'type' => 'long_text',
                'ar_value' => 'balbalbalb',
                'en_value' => 'balablabal',
                'page' => 'النصوص',
                'slug' => 'text',
                'title' => 'عنوان البداية الاول',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'text-splash-2',
                'type' => 'long_text',
                'ar_value' => 'balbalbalb',
                'en_value' => 'balablabal',
                'page' => 'النصوص',
                'slug' => 'text',
                'title' => 'عنوان البداية الثاني',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'text-splash-3',
                'type' => 'long_text',
                'ar_value' => 'balbalbalb',
                'en_value' => 'balablabal',
                'page' => 'النصوص',
                'slug' => 'text',
                'title' => 'عنوان البداية الثالث',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}