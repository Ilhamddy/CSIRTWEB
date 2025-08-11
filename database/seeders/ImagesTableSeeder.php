<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('images')->delete();
        
        \DB::table('images')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Kegiatan Penting Update',
                'image_path' => 'photos/30445d7c-e28a-42a1-adb0-54919f0e6df7.jpeg',
                'date_agenda' => '2025-08-11',
                'category_id' => 3,
                'user_id' => 10,
                'created_at' => '2025-08-11 15:27:07',
                'updated_at' => '2025-08-11 15:48:55',
            ),
            1 => 
            array (
                'id' => 3,
                'title' => 'Kegiatan Penting Update',
                'image_path' => 'photos/30445d7c-e28a-42a1-adb0-54919f0e6df7.jpeg',
                'date_agenda' => '2025-08-11',
                'category_id' => 3,
                'user_id' => 10,
                'created_at' => '2025-08-11 15:27:07',
                'updated_at' => '2025-08-11 15:48:55',
            ),
            2 => 
            array (
                'id' => 4,
                'title' => 'Kegiatan Diskominfo',
                'image_path' => 'photos/37750af8-678b-45d5-b1e5-3ca8633bed81.jpeg',
                'date_agenda' => '2025-08-11',
                'category_id' => 7,
                'user_id' => 10,
                'created_at' => '2025-08-11 15:49:43',
                'updated_at' => '2025-08-11 16:06:50',
            ),
            3 => 
            array (
                'id' => 6,
                'title' => 'Kegiatan Penting Update',
                'image_path' => 'photos/30445d7c-e28a-42a1-adb0-54919f0e6df7.jpeg',
                'date_agenda' => '2025-08-11',
                'category_id' => 3,
                'user_id' => 10,
                'created_at' => '2025-08-11 15:27:07',
                'updated_at' => '2025-08-11 15:48:55',
            ),
            4 => 
            array (
                'id' => 7,
                'title' => 'Kegiatan Diskominfo',
                'image_path' => 'photos/ad13dc8c-c179-4f64-afe8-42043cc58baa.png',
                'date_agenda' => '2025-08-11',
                'category_id' => 7,
                'user_id' => 10,
                'created_at' => '2025-08-11 15:49:43',
                'updated_at' => '2025-08-11 16:06:34',
            ),
            5 => 
            array (
                'id' => 9,
                'title' => 'Kegiatan Diskominfo',
                'image_path' => 'photos/a027994a-e640-4601-ae63-eb0345ad24b4.png',
                'date_agenda' => '2025-08-11',
                'category_id' => 7,
                'user_id' => 10,
                'created_at' => '2025-08-11 15:49:43',
                'updated_at' => '2025-08-11 16:07:07',
            ),
            6 => 
            array (
                'id' => 10,
                'title' => 'Kegiatan Penting Update',
                'image_path' => 'photos/30445d7c-e28a-42a1-adb0-54919f0e6df7.jpeg',
                'date_agenda' => '2025-08-11',
                'category_id' => 3,
                'user_id' => 10,
                'created_at' => '2025-08-11 23:02:04',
                'updated_at' => '2025-08-11 15:48:55',
            ),
            7 => 
            array (
                'id' => 11,
                'title' => 'Statistik Agenda',
                'image_path' => 'photos/e1d9fc2c-f1b3-44cc-98d4-b72d4c51b713.jpg',
                'date_agenda' => '2025-08-11',
                'category_id' => 3,
                'user_id' => 10,
                'created_at' => '2025-08-11 16:08:11',
                'updated_at' => '2025-08-11 16:08:11',
            ),
        ));
        
        
    }
}