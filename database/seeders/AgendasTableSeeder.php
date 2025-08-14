<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AgendasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('agendas')->delete();
        
        \DB::table('agendas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Rapat Koordinasi',
                'description' => 'di Pemkab',
                'start_date' => '2025-08-14 09:00:00',
                'end_date' => '2025-08-14 10:00:00',
                'category_id' => 3,
                'user_id' => 10,
                'created_at' => '2025-08-12 15:23:58',
                'updated_at' => '2025-08-12 15:23:58',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Rapat Koordinasi SPBE',
                'description' => 'di Ruang Rapat Kominfo',
                'start_date' => '2025-08-14 09:00:00',
                'end_date' => '2025-08-14 12:00:00',
                'category_id' => 3,
                'user_id' => 10,
                'created_at' => '2025-08-12 15:25:33',
                'updated_at' => '2025-08-12 15:25:33',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Kegiatan Diskominfo',
                'description' => 'Testing Slider',
                'start_date' => '2025-08-14 09:00:00',
                'end_date' => '2025-08-14 14:00:00',
                'category_id' => 7,
                'user_id' => 10,
                'created_at' => '2025-08-12 15:27:25',
                'updated_at' => '2025-08-12 15:34:57',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Submit Evaluasi SPBE',
                'description' => 'Submit Penilaian SPBE 2025',
                'start_date' => '2025-08-18 14:00:00',
                'end_date' => '2025-08-18 15:00:00',
                'category_id' => 7,
                'user_id' => 10,
                'created_at' => '2025-08-12 16:11:38',
                'updated_at' => '2025-08-12 16:11:38',
            ),
        ));
        
        
    }
}