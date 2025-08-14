<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('profiles')->delete();
        
        \DB::table('profiles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'visi' => 'Terwujudnya Pelayanan Prima Berbasis Teknologi informasi',
                'misi' => 'Meningkatkan Pelayanan Berbasis E-Gov, Meningkatkan Sistem Informasi Daerah, Meningkatkan Sistem Keamanan Informasi Daerah, Meningkatkan Kualitas pelayanan data dan Statistik, Mewujudkan Media Layanan Publik di Kecamatan',
                'logo' => 'logos/zCdn0GhGbvDIDAC3XTDDdTfC99Vcca1lVxzD0iKE.png',
                'sejarah' => 'Mewujudkan tata kelola komunikasi dan informatika yang sehat, efisien dan aman;
Meningkatkan akses masyarakat terhadap informasi;
Menciptakan sumber daya TIK yang unggul, produktif dan berdaya saing;
Meningkatkan partisipasi publik terhadap pengambilan kebijakan publik; dan Rencana Strategis tahun 2018-2022 Dinas Komunikasi dan Informatika Kab. Penajam Paser Utara;
Menyediakan dukungan TIK dalam rangka pencapaian fokus pembangunan pemerintah Indonesia;',
                'struktur_organisasi' => 'struktur_organisasi/4x3sPeVf3OL03f1uBHsya9vdfcpi7qDeXNeqbaaw.png',
                'user_id' => 10,
                'created_at' => '2025-08-14 14:41:04',
                'updated_at' => '2025-08-14 14:55:39',
            ),
        ));
        
        
    }
}