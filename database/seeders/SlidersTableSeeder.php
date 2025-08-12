<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SlidersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sliders')->delete();
        
        \DB::table('sliders')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Slider 1',
                'description' => 'Testing Slider',
                'image' => 'sliders/aee57d15-78aa-4915-9e49-0d24245ef0d7.jpg',
                'link' => 'https://diskominfo.penajamkab.go.id/',
                'is_active' => 1,
                'sort_order' => 1,
                'user_id' => 10,
                'created_at' => '2025-08-12 14:27:30',
                'updated_at' => '2025-08-12 14:32:49',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Slider 2',
                'description' => 'Testing Slider 2',
                'image' => 'sliders/effaf22a-d1fe-43f6-b98d-3244c3bc6281.jpg',
                'link' => 'https://www.instagram.com/arif.nrrhmn/',
                'is_active' => 1,
                'sort_order' => 2,
                'user_id' => 10,
                'created_at' => '2025-08-12 14:33:32',
                'updated_at' => '2025-08-12 14:33:32',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Slider 3',
                'description' => 'Testing Slider 3',
                'image' => 'sliders/8ce36318-94dc-42d3-ac18-ec7cb34fc0ba.png',
                'link' => 'https://diskominfo.penajamkab.go.id/',
                'is_active' => 1,
                'sort_order' => 3,
                'user_id' => 10,
                'created_at' => '2025-08-12 14:38:51',
                'updated_at' => '2025-08-12 14:38:51',
            ),
        ));
        
        
    }
}