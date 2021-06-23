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
                'ar_value' => 'test@test.com',
                'en_value' => 'text@text.com',
                'page' => 'حسابات التواصل',
                'slug' => 'socials',
                'title' => 'البريد الالكتروني',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'phone',
                'type' => 'text',
                'ar_value' => '01010100101',
                'en_value' => '01010101010',
                'page' => 'حسابات التواصل',
                'slug' => 'socials',
                'title' => 'رقم الهاتف',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'facebook',
                'type' => 'text',
                'ar_value' => '01010100101',
                'en_value' => '01010101010',
                'page' => 'حسابات التواصل',
                'slug' => 'socials',
                'title' => 'حساب الفيسبوك',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'twitter',
                'type' => 'text',
                'ar_value' => '01010100101',
                'en_value' => '01010101010',
                'page' => 'حسابات التواصل',
                'slug' => 'socials',
                'title' => 'حساب تويتر',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'snapchat',
                'type' => 'text',
                'ar_value' => '01010100101',
                'en_value' => '01010101010',
                'page' => 'حسابات التواصل',
                'slug' => 'socials',
                'title' => 'حساب سناب شات',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}