<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contacts')->delete();
        
        \DB::table('contacts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'email' => 'diskominfo@penajamkab.go.id',
                'phone' => '085386420085',
                'fax' => NULL,
                'address' => 'Kompleks Pemerintahan Gedung Asisten I, Lt. II, Jl. Propinsi Km. 9 Nipah-Nipah, Penajam',
                'description' => NULL,
                'latitude' => '-1.3098622517056333',
                'longitude' => '116.72842898834341',
                'social_media' => NULL,
                'whatsapp' => NULL,
                'telegram' => NULL,
                'instagram' => NULL,
                'facebook' => NULL,
                'twitter' => NULL,
                'youtube' => NULL,
                'tiktok' => NULL,
                'user_id' => 10,
                'created_at' => '2025-08-14 16:23:18',
                'updated_at' => '2025-08-14 16:24:57',
            ),
        ));
        
        
    }
}