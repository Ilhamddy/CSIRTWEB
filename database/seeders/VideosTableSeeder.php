<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VideosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('videos')->delete();
        
        \DB::table('videos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Video Perkenalan Diskominfo Update',
                'url' => 'lqIGP_doGk8',
                'date_agenda' => '2025-08-11',
                'category_id' => 3,
                'user_id' => 10,
                'created_at' => '2025-08-11 16:29:22',
                'updated_at' => '2025-08-11 16:32:14',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Diskominfo Travelling',
                'url' => 'lqIGP_doGk8',
                'date_agenda' => '2025-08-11',
                'category_id' => 3,
                'user_id' => 10,
                'created_at' => '2025-08-11 16:32:55',
                'updated_at' => '2025-08-11 16:32:55',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Video Perkenalan Diskominfo 2',
                'url' => 'lqIGP_doGk8',
                'date_agenda' => '2025-08-11',
                'category_id' => 3,
                'user_id' => 10,
                'created_at' => '2025-08-11 16:29:22',
                'updated_at' => '2025-08-11 16:32:14',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Video Perkenalan Diskominfo Update',
                'url' => 'lqIGP_doGk8',
                'date_agenda' => '2025-08-11',
                'category_id' => 3,
                'user_id' => 10,
                'created_at' => '2025-08-11 16:29:22',
                'updated_at' => '2025-08-11 16:32:14',
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'Diskominfo Travelling',
                'url' => 'lqIGP_doGk8',
                'date_agenda' => '2025-08-11',
                'category_id' => 3,
                'user_id' => 10,
                'created_at' => '2025-08-11 16:32:55',
                'updated_at' => '2025-08-11 16:32:55',
            ),
        ));
        
        
    }
}