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
                'ar_value' => 'balbalbalb',
                'created_at' => NULL,
                'en_value' => 'balablabal',
                'id' => 1,
                'name' => 'about',
                'page' => 'النصوص',
                'slug' => 'text',
                'title' => 'من نحن',
                'type' => 'long_text',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'ar_value' => 'faq balbalbalbal',
                'created_at' => NULL,
                'en_value' => 'faq balbalbalbal',
                'id' => 2,
                'name' => 'frequency_questions',
                'page' => 'النصوص',
                'slug' => 'text',
                'title' => 'الاسئلة الشائعة',
                'type' => 'long_text',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'ar_value' => 'privacy blabal',
                'created_at' => NULL,
                'en_value' => 'privacy balbala',
                'id' => 3,
                'name' => 'privacy',
                'page' => 'النصوص',
                'slug' => 'text',
                'title' => 'الخصوصية',
                'type' => 'long_text',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'ar_value' => 'test@test.com',
                'created_at' => NULL,
                'en_value' => 'text@text.com',
                'id' => 4,
                'name' => 'email',
                'page' => 'حسابات التواصل',
                'slug' => 'socials',
                'title' => 'البريد الالكتروني',
                'type' => 'text',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'ar_value' => '01010100101',
                'created_at' => NULL,
                'en_value' => '01010101010',
                'id' => 5,
                'name' => 'phone',
                'page' => 'حسابات التواصل',
                'slug' => 'socials',
                'title' => 'رقم الهاتف',
                'type' => 'text',
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'ar_value' => '01010100101',
                'created_at' => NULL,
                'en_value' => '01010101010',
                'id' => 6,
                'name' => 'facebook',
                'page' => 'حسابات التواصل',
                'slug' => 'socials',
                'title' => 'حساب الفيسبوك',
                'type' => 'text',
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'ar_value' => '01010100101',
                'created_at' => NULL,
                'en_value' => '01010101010',
                'id' => 7,
                'name' => 'twitter',
                'page' => 'حسابات التواصل',
                'slug' => 'socials',
                'title' => 'حساب تويتر',
                'type' => 'text',
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'ar_value' => '01010100101',
                'created_at' => NULL,
                'en_value' => '01010101010',
                'id' => 8,
                'name' => 'snapchat',
                'page' => 'حسابات التواصل',
                'slug' => 'socials',
                'title' => 'حساب سناب شات',
                'type' => 'text',
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'ar_value' => 'privacy blabal',
                'created_at' => NULL,
                'en_value' => 'privacy balbala',
                'id' => 9,
                'name' => 'add-advertisement',
                'page' => 'النصوص',
                'slug' => 'text',
                'title' => 'شروط اضافة اعلان',
                'type' => 'long_text',
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'ar_value' => 'privacy blabal',
                'created_at' => NULL,
                'en_value' => 'privacy balbala',
                'id' => 10,
                'name' => 'add-request',
                'page' => 'النصوص',
                'slug' => 'text',
                'title' => 'شروط اضافة طلب',
                'type' => 'long_text',
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'ar_value' => 'privacy blabal',
                'created_at' => NULL,
                'en_value' => 'privacy balbala',
                'id' => 11,
                'name' => 'add-offer',
                'page' => 'النصوص',
                'slug' => 'text',
                'title' => 'شروط اضافة عرض',
                'type' => 'long_text',
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'ar_value' => 'special_ad',
                'created_at' => NULL,
                'en_value' => 'special_ad',
                'id' => 12,
                'name' => 'special_ad',
                'page' => 'النصوص',
                'slug' => 'text',
                'title' => 'شروط اضافة اعلان مميز',
                'type' => 'long_text',
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'ar_value' => '10',
                'created_at' => NULL,
                'en_value' => '10',
                'id' => 13,
                'name' => 'special_price',
                'page' => 'الماليات',
                'slug' => 'finance',
                'title' => 'سعر اشتراك تميز الاعلان الشهري',
                'type' => 'number',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}