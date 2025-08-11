<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('posts')->delete();
        
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => '417d6dc8-4514-4b50-82a9-a0d361c3b695',
                'title' => 'Berita Kominfo Updated',
                'content' => '<p>Berita Kominfo terupdate</p>',
                'slug' => 'berita-kominfo-updated',
                'type' => 'berita',
                'user_id' => 10,
                'image' => 'posts/b96ab1e4-186e-4bcf-95b8-f21f719883e6.jpg',
                'source' => 'https://google.com',
                'is_published' => 1,
                'published_at' => '2025-08-11 14:11:09',
                'tags' => 'tag1, tag2',
                'views' => 0,
                'likes' => 0,
                'comments_count' => 0,
                'status' => 'published',
                'meta_title' => NULL,
                'meta_description' => NULL,
                'meta_keywords' => NULL,
                'featured_image' => NULL,
                'created_at' => '2025-08-11 13:56:11',
                'updated_at' => '2025-08-11 14:11:09',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => '56a5a8c8-5fd3-40e0-aace-6dcfc4693129',
                'title' => 'Semarak HUT ke-80 RI, Pemkab PPU Bagikan 4.200 Bendera Merah Putih kepada Warga',
            'content' => '<p style="margin-bottom: 20px; color: rgb(34, 34, 34); font-family: &quot;Work Sans&quot;, sans-serif; font-size: 16px; text-align: justify;">Penajam — Dalam rangka menyemarakkan Hari Ulang Tahun (HUT) ke-80 Kemerdekaan Republik Indonesia, Pemerintah Kabupaten Penajam Paser Utara (PPU) menggelar kegiatan pembagian bendera merah putih kepada masyarakat, Kamis (7/8/2025). Sebanyak 4.200 lembar bendera dibagikan secara gratis kepada warga sebagai bagian dari gerakan nasional pemasangan bendera di seluruh penjuru tanah air.</p><p style="margin-bottom: 20px; color: rgb(34, 34, 34); font-family: &quot;Work Sans&quot;, sans-serif; font-size: 16px; text-align: justify;">Kegiatan ini dipusatkan di depan Alun-Alun Penyembolum Kecamatan Penajam. Tampak hadir secara langsung Wakil Bupati PPU Abdul Waris Muin, Sekretaris Daerah Tohar, Anggota Dewan Perwakilan Rakyat Daerah Muhammad Bijak Ilhamdani, Kodim, jajaran kepolisian, serta unsur organisasi perangkat daerah (OPD) terkait. Antusiasme masyarakat pun terlihat tinggi, menyambut simbol-simbol kebangsaan dengan penuh semangat.</p><p style="margin-bottom: 20px; color: rgb(34, 34, 34); font-family: &quot;Work Sans&quot;, sans-serif; font-size: 16px; text-align: justify;">Wakil Bupati PPU Abdul Waris Muin dalam kesempatan itu menyampaikan bahwa pembagian bendera ini merupakan bentuk ajakan kepada seluruh elemen masyarakat untuk menumbuhkan semangat nasionalisme dan memperingati kemerdekaan RI dengan penuh suka cita.</p><p style="margin-bottom: 20px; color: rgb(34, 34, 34); font-family: &quot;Work Sans&quot;, sans-serif; font-size: 16px; text-align: justify;">“Semoga dalam merayakan kemerdekaan Republik Indonesia yang ke-80, ini kita semua mendapatkan keberkahanya, walaupun dengan usia 80 itu kita tidak mudah mendapatkanya” ujar Waris.</p><p style="margin-bottom: 20px; color: rgb(34, 34, 34); font-family: &quot;Work Sans&quot;, sans-serif; font-size: 16px; text-align: justify;">Ia menambahkan, pembagian ribuan bendera ini juga menjadi wujud komitmen pemerintah daerah dalam mendukung program nasional Gerakan Pembagian 10 Juta Bendera Merah Putih yang dicanangkan oleh Kementerian Dalam Negeri RI.</p><p style="margin-bottom: 20px; color: rgb(34, 34, 34); font-family: &quot;Work Sans&quot;, sans-serif; font-size: 16px; text-align: justify;">“Selain di depan Alun Alun Penyembolum kami juga disalurkan ke empat kecamatan, yakni Penajam, Waru, Babulu, dan Sepaku. Masing-masing kecamatan mendapatkan distribusi bendera”, tambahnya.</p><p style="margin-bottom: 20px; color: rgb(34, 34, 34); font-family: &quot;Work Sans&quot;, sans-serif; font-size: 16px; text-align: justify;">Acara pembagian bendera ini berlangsung secara simbolis di depan Alun-Alun Penyembolum, dilanjutkan dengan pembagian langsung kepada masyarakat yang melintas di sekitar area tersebut. Petugas dari Satpol PP, Kesbangpol, jajaran kepolisian dan instansi lainnya turut membantu kelancaran kegiatan.</p><p style="margin-bottom: 20px; color: rgb(34, 34, 34); font-family: &quot;Work Sans&quot;, sans-serif; font-size: 16px; text-align: justify;">Melalui kegiatan ini, Pemerintah Kabupaten PPU berharap masyarakat dapat bersama-sama mengibarkan bendera merah putih mulai 1 hingga 31 Agustus 2025 sebagai bentuk cinta tanah air, penghormatan terhadap para pahlawan, dan penyemangat untuk terus berkarya demi kemajuan bangsa.</p>',
                'slug' => 'semarak-hut-ke-80-ri-pemkab-ppu-bagikan-4200-bendera-merah-putih-kepada-warga',
                'type' => 'berita',
                'user_id' => 10,
                'image' => 'posts/d0b3f572-d447-47d3-aee7-b5bf923c30b9.jpeg',
                'source' => 'https://penajamkab.go.id/semarak-hut-ke-80-ri-pemkab-ppu-bagikan-4-200-bendera-merah-putih-kepada-warga/',
                'is_published' => 1,
                'published_at' => '2025-08-10 16:13:59',
                'tags' => 'Diskominfo, Penajam Paser Utara',
                'views' => 0,
                'likes' => 0,
                'comments_count' => 0,
                'status' => 'published',
                'meta_title' => NULL,
                'meta_description' => NULL,
                'meta_keywords' => NULL,
                'featured_image' => NULL,
                'created_at' => '2025-08-09 11:19:21',
                'updated_at' => '2025-08-10 16:13:59',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => '89eb5536-4a90-4264-96b4-0ea031a567f9',
                'title' => 'Mutasi, Bupati PPU Tegaskan Kriteria ASN dan Pejabat yang Diinginkan',
            'content' => '<p style="font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34);"><strong style="font-weight: bold;">BERITAPENAJAM</strong>.– Dalam upaya mempercepat pembangunan daerah dan meningkatkan kualitas pelayanan publik, Bupati Penajam Paser Utara (PPU), Mudyat Noor, menegaskan pentingnya memiliki Aparatur Sipil Negara (ASN) dan pejabat struktural yang profesional, disiplin, dan berorientasi pada hasil kerja.</p><p style="font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34);">Bupati menyampaikan bahwa setiap pejabat yang menduduki jabatan di struktur Satuan Kerja Perangkat Daerah (SKPD) akan diberi target kinerja yang jelas dan terukur dalam waktu enam bulan sejak dilantik. Target tersebut menjadi dasar utama dalam menilai kontribusi dan efektivitas kinerja masing-masing pejabat dalam mendukung visi pembangunan daerah.</p><p style="font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34);">“Saya tidak butuh pejabat yang hanya duduk di belakang meja. Saya ingin ASN dan pejabat yang siap bekerja keras, punya inovasi, dan mampu memberikan dampak nyata bagi masyarakat,” tegas Bupati PPU.</p><p style="font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34);">Lebih lanjut, Bupati juga menyampaikan bahwa pihaknya akan melakukan evaluasi menyeluruh terhadap para pejabat yang saat ini sedang menjabat, termasuk Kepala Dinas, Sekretaris, hingga pejabat eselon lainnya. Evaluasi dilakukan berdasarkan pencapaian program kerja, kedisiplinan, serta kontribusi nyata terhadap percepatan pembangunan infrastruktur dan pelayanan publik.</p><p style="font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34);">Dalam proses penilaian dan pengambilan keputusan, Bupati menegaskan bahwa segala bentuk rotasi, mutasi, hingga promosi jabatan akan dilakukan dengan memperhatikan pertimbangan dari Badan Pertimbangan Jabatan dan Kepangkatan (Baperjakat).</p><p style="font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34);">“Baperjakat akan menjadi bagian penting dalam proses pertimbangan. Namun tetap, indikator utamanya adalah kinerja, etika kerja, dan loyalitas terhadap pembangunan daerah,” jelas Bupati.</p><p style="font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34);">Bupati juga mengingatkan bahwa ke depan, pejabat yang tidak mampu memenuhi target atau menunjukkan komitmen kerja yang baik berpotensi untuk diganti atau dimutasi. Langkah ini bukan bentuk hukuman, melainkan bentuk penyegaran dan upaya mempercepat kemajuan daerah.</p><p style="font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34);">Dari hasil wawancara media Berita Penajam bersama Bupati PPU, dirinya menjelaskan ada lima kriteria yang diharapkan dapat di penuhi oleh pejabat demi percepatan pembangunan dan pelayanan maksimal untuk masyarakat PPU.</p><p style="font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34);">1.&nbsp;<strong style="font-weight: bold;">Kompeten dan Profesional – Menguasai bidang kerja, memiliki integritas, dan menjalankan tugas sesuai aturan.</strong></p><p style="font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34);"><strong style="font-weight: bold;">2. Berorientasi pada Kinerja – Siap menerima target dan mampu menunjukkan hasil kerja dalam jangka waktu tertentu.</strong></p><p style="font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34);"><strong style="font-weight: bold;">3. Inovatif dan Responsif – Mampu menciptakan solusi dan terobosan yang dibutuhkan masyarakat.</strong></p><p style="font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34);"><strong style="font-weight: bold;">4. Disiplin dan Taat Aturan – Menjunjung tinggi etika birokrasi dan tidak melakukan pelanggaran kepegawaian.</strong></p><p style="font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34);"><strong style="font-weight: bold;">5. Komunikatif dan Kolaboratif – Bisa bekerja sama lintas sektor dan membangun hubungan harmonis dengan masyarakat.</strong></p><p style="font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34);">Dengan pendekatan ini, Bupati Mudyat Noor berharap PPU memiliki struktur birokrasi yang solid, adaptif, dan mampu bekerja secara maksimal demi kepentingan masyarakat luas.(bp)</p>',
                'slug' => 'mutasi-bupati-ppu-tegaskan-kriteria-asn-dan-pejabat-yang-diinginkan',
                'type' => 'berita',
                'user_id' => 10,
                'image' => 'posts/37d21c94-2c13-4121-9397-97862f30277f.jpg',
                'source' => 'https://diskominfo.penajamkab.go.id/2025/07/mutasi-bupati-ppu-tegaskan-kriteria-asn-dan-pejabat-yang-diinginkan/',
                'is_published' => 1,
                'published_at' => '2025-08-10 16:13:31',
                'tags' => 'Diskominfo, Penajam Paser Utara',
                'views' => 0,
                'likes' => 0,
                'comments_count' => 0,
                'status' => 'published',
                'meta_title' => NULL,
                'meta_description' => NULL,
                'meta_keywords' => NULL,
                'featured_image' => NULL,
                'created_at' => '2025-08-10 16:13:31',
                'updated_at' => '2025-08-10 16:13:31',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 'abe6974b-9198-4aeb-a267-c32e8e753c30',
                'title' => 'Berita Aja',
                'content' => '<p>asdasdasd</p>',
                'slug' => 'berita-aja',
                'type' => 'berita',
                'user_id' => 10,
                'image' => 'posts/40499904-ed7a-4d2c-923f-2a6f58cfe923.jpg',
                'source' => 'https://google.com',
                'is_published' => 1,
                'published_at' => '2025-08-11 13:36:28',
                'tags' => 'tag1, tag2',
                'views' => 0,
                'likes' => 0,
                'comments_count' => 0,
                'status' => 'published',
                'meta_title' => NULL,
                'meta_description' => NULL,
                'meta_keywords' => NULL,
                'featured_image' => NULL,
                'created_at' => '2025-08-11 13:36:28',
                'updated_at' => '2025-08-11 13:36:28',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 'b092de7f-5db2-44f6-9654-1dd03d7838c3',
                'title' => 'Diskominfo PPU Laksanakan Visitasi Monev Keterbukaan Informasi Publik',
            'content' => '<p style="font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34);">PENAJAM – Dinas Komunikasi dan Informatika (Diskominfo) Kabupaten Penajam Paser Utara (PPU) bersama Komisi Informasi (KI) Provinsi Kalimantan Timur (Kaltim) melaksanakan visitasi monitoring dan evaluasi (monev) keterbukaan informasi publik (KIP) pada enam organisasi perangkat daerah (OPD) di lingkungan Pemkab PPU, Kamis (7/8/2025).</p><p style="font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34);"><img loading="lazy" class="size-medium wp-image-5210 aligncenter td-animation-stack-type0-1" src="https://diskominfo.penajamkab.go.id/wp-content/uploads/2025/08/WhatsApp-Image-2025-08-08-at-10.46.32-300x200.jpeg" alt="" width="300" height="200" srcset="https://diskominfo.penajamkab.go.id/wp-content/uploads/2025/08/WhatsApp-Image-2025-08-08-at-10.46.32-300x200.jpeg 300w, https://diskominfo.penajamkab.go.id/wp-content/uploads/2025/08/WhatsApp-Image-2025-08-08-at-10.46.32-1024x682.jpeg 1024w, https://diskominfo.penajamkab.go.id/wp-content/uploads/2025/08/WhatsApp-Image-2025-08-08-at-10.46.32-768x512.jpeg 768w, https://diskominfo.penajamkab.go.id/wp-content/uploads/2025/08/WhatsApp-Image-2025-08-08-at-10.46.32-1536x1024.jpeg 1536w, https://diskominfo.penajamkab.go.id/wp-content/uploads/2025/08/WhatsApp-Image-2025-08-08-at-10.46.32-2048x1365.jpeg 2048w, https://diskominfo.penajamkab.go.id/wp-content/uploads/2025/08/WhatsApp-Image-2025-08-08-at-10.46.32-696x464.jpeg 696w, https://diskominfo.penajamkab.go.id/wp-content/uploads/2025/08/WhatsApp-Image-2025-08-08-at-10.46.32-1068x712.jpeg 1068w, https://diskominfo.penajamkab.go.id/wp-content/uploads/2025/08/WhatsApp-Image-2025-08-08-at-10.46.32-630x420.jpeg 630w, https://diskominfo.penajamkab.go.id/wp-content/uploads/2025/08/WhatsApp-Image-2025-08-08-at-10.46.32-1920x1280.jpeg 1920w" sizes="(max-width: 300px) 100vw, 300px" style="border: 0px; max-width: 100%; height: auto; clear: both; text-align: center; display: block; margin: 6px auto 21px;"></p><p style="font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34);">Enam OPD yang menjadi sasaran visitasi yakni Dinas Pendidikan, Pemuda dan Olahraga (Disdikpora), Badan Keuangan dan Aset Daerah (BKAD), Dinas Lingkungan Hidup (DLH), Dinas Pemberdayaan Masyarakat dan Desa (DPMD), Dinas Pemberdayaan Perempuan, Perlindungan Anak, Pengendalian Penduduk dan Keluarga Berencana (DP3AP2KB), serta Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu (DPMPTSP).</p><p style="font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34);">Kegiatan di lakukan sebagai komitmen Pemkab PPU dalam menerapkan prinsip keterbukaan informasi publik, sekaligus meningkatkan kualitas layanan yang transparan dan akuntabel. Hal ini sebagaimana diamanatkan Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik.</p><p style="font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34);">Ketua KI Provinsi Kaltim, Imran Duse yang turut hadir sekaligus menjadi penilai, mengapresiasi langkah Pemkab PPU. Ia menilai, Kabupaten PPU menjadi salah satu daerah yang mampu melaksanakan visitasi monev secara mandiri di tingkat kabupaten/kota.</p><p style="font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34);">“Kabupaten PPU ini sangat luar biasa dan saya apresiasi karena mampu melaksanakan monev secara mandiri. Kabupaten PPU ini menjadi kedua setelah Kutim dari 10 kabupaten/kota di Kaltim yang mampu melaksanakan ini,” Ujar Imran.</p><p style="font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34);"><img loading="lazy" class="size-medium wp-image-5211 aligncenter td-animation-stack-type0-1" src="https://diskominfo.penajamkab.go.id/wp-content/uploads/2025/08/WhatsApp-Image-2025-08-08-at-10.46.35-300x200.jpeg" alt="" width="300" height="200" srcset="https://diskominfo.penajamkab.go.id/wp-content/uploads/2025/08/WhatsApp-Image-2025-08-08-at-10.46.35-300x200.jpeg 300w, https://diskominfo.penajamkab.go.id/wp-content/uploads/2025/08/WhatsApp-Image-2025-08-08-at-10.46.35-1024x682.jpeg 1024w, https://diskominfo.penajamkab.go.id/wp-content/uploads/2025/08/WhatsApp-Image-2025-08-08-at-10.46.35-768x512.jpeg 768w, https://diskominfo.penajamkab.go.id/wp-content/uploads/2025/08/WhatsApp-Image-2025-08-08-at-10.46.35-1536x1023.jpeg 1536w, https://diskominfo.penajamkab.go.id/wp-content/uploads/2025/08/WhatsApp-Image-2025-08-08-at-10.46.35-696x464.jpeg 696w, https://diskominfo.penajamkab.go.id/wp-content/uploads/2025/08/WhatsApp-Image-2025-08-08-at-10.46.35-1068x712.jpeg 1068w, https://diskominfo.penajamkab.go.id/wp-content/uploads/2025/08/WhatsApp-Image-2025-08-08-at-10.46.35-630x420.jpeg 630w, https://diskominfo.penajamkab.go.id/wp-content/uploads/2025/08/WhatsApp-Image-2025-08-08-at-10.46.35.jpeg 1600w" sizes="(max-width: 300px) 100vw, 300px" style="border: 0px; max-width: 100%; height: auto; clear: both; text-align: center; display: block; margin: 6px auto 21px;"></p><p style="font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34);">Ia juga berharap perwakilan OPD Kabupaten PPU mampu menembus minimal tiga besar dalam penilaian keterbukaan informasi publik tahun 2025. Imran juga menyarankan agar tahun depan Pemkab PPU menambahkan kategori monev keterbukaan informasi publik untuk tingkat desa.</p><p style="font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34);">“Sehingga transparansi bisa merata hingga ke akar pemerintahan,” Pungkasnya</p><p style="font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34);">Sementara itu, salah satu Kepala Dinas menambahkan selama ini mengenai keterbukaan publik, ia bersama tim telah berupaya menyediakan berbagai saluran informasi yang mudah diakses masyarakat, seperti melalui website resmi, akun Instagram, serta kanal YouTube. Namun demikian, tantangan masih kerap muncul, terutama dari masyarakat yang belum familiar dengan teknologi atau belum memahami cara mengakses informasi digital.</p><p style="font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34);">“Kami menyadari bahwa masih ada kendala di masyarakat, terutama dalam hal pemahaman terhadap aplikasi dan media digital. Oleh karena itu, kami selalu siap membantu dan membimbing mereka untuk bisa mengakses informasi melalui platform yang kami sediakan,” jelasnya Kepala DP3AP2KB, Chairul Rozikin saat dijumpai</p><p style="font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34);"><img loading="lazy" class="size-medium wp-image-5212 aligncenter td-animation-stack-type0-1" src="https://diskominfo.penajamkab.go.id/wp-content/uploads/2025/08/WhatsApp-Image-2025-08-08-at-10.46.34-300x200.jpeg" alt="" width="300" height="200" srcset="https://diskominfo.penajamkab.go.id/wp-content/uploads/2025/08/WhatsApp-Image-2025-08-08-at-10.46.34-300x200.jpeg 300w, https://diskominfo.penajamkab.go.id/wp-content/uploads/2025/08/WhatsApp-Image-2025-08-08-at-10.46.34-1024x682.jpeg 1024w, https://diskominfo.penajamkab.go.id/wp-content/uploads/2025/08/WhatsApp-Image-2025-08-08-at-10.46.34-768x512.jpeg 768w, https://diskominfo.penajamkab.go.id/wp-content/uploads/2025/08/WhatsApp-Image-2025-08-08-at-10.46.34-1536x1023.jpeg 1536w, https://diskominfo.penajamkab.go.id/wp-content/uploads/2025/08/WhatsApp-Image-2025-08-08-at-10.46.34-696x464.jpeg 696w, https://diskominfo.penajamkab.go.id/wp-content/uploads/2025/08/WhatsApp-Image-2025-08-08-at-10.46.34-1068x712.jpeg 1068w, https://diskominfo.penajamkab.go.id/wp-content/uploads/2025/08/WhatsApp-Image-2025-08-08-at-10.46.34-630x420.jpeg 630w, https://diskominfo.penajamkab.go.id/wp-content/uploads/2025/08/WhatsApp-Image-2025-08-08-at-10.46.34.jpeg 1600w" sizes="(max-width: 300px) 100vw, 300px" style="border: 0px; max-width: 100%; height: auto; clear: both; text-align: center; display: block; margin: 6px auto 21px;"></p><p style="font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34);">Tak hanya itu, DP3AP2KB juga menyediakan formulir penilaian pelayanan sebagai wadah bagi masyarakat untuk memberikan masukan, keluhan, maupun apresiasi terhadap layanan yang mereka terima. Hal ini menjadi bagian dari evaluasi internal untuk perbaikan berkelanjutan.</p><p style="font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34);">“Kami ingin masyarakat menilai secara jujur. Jika ada ketidakpuasan, kami terbuka menerimanya. Itu menjadi bahan evaluasi agar kami bisa memperbaiki dan meningkatkan kualitas pelayanan,” tegasnya.</p><p style="font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34);">Choirul Rozikin juga mengapresiasi hasil penilaian dari Komisi Informasi Provinsi Kalimantan Timur yang menyebutkan bahwa konten-konten layanan informasi publik yang ditampilkan oleh DP3AP2KB sudah berkesesuaian dan memiliki nilai makna yang kuat terhadap transparansi layanan.</p><p style="font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-bottom: 26px; overflow-wrap: break-word; color: rgb(34, 34, 34);">“Alhamdulillah, tadi dari Komisi Informasi memberi apresiasi. Mereka melihat bahwa apa yang kami tampilkan sudah cukup memuaskan. Tapi tentu saja kami tidak berhenti sampai di sini. Kami terus berbenah dan berupaya memberikan yang lebih baik,” pungkasnya. (W/Zan/DiskominfoPPU)</p>',
                'slug' => 'diskominfo-ppu-laksanakan-visitasi-monev-keterbukaan-informasi-publik',
                'type' => 'berita',
                'user_id' => 10,
                'image' => 'posts/f3d4dd8b-bd4d-4a42-a143-8528946740a6.jpeg',
                'source' => 'https://diskominfo.penajamkab.go.id/2025/08/diskominfo-ppu-laksanakan-visitasi-monev-keterbukaan-informasi-publik/',
                'is_published' => 1,
                'published_at' => '2025-08-10 13:14:55',
                'tags' => 'Diskominfo, Penajam Paser Utara',
                'views' => 0,
                'likes' => 0,
                'comments_count' => 0,
                'status' => 'published',
                'meta_title' => NULL,
                'meta_description' => NULL,
                'meta_keywords' => NULL,
                'featured_image' => NULL,
                'created_at' => '2025-08-10 13:14:55',
                'updated_at' => '2025-08-10 13:14:55',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 'c3a258a0-e395-47b2-994b-0e57bf500f57',
                'title' => 'Berita IKPH',
                'content' => '<p>Berita IKPH</p>',
                'slug' => 'berita-ikph',
                'type' => 'berita',
                'user_id' => 10,
                'image' => 'posts/3e807717-0947-4f87-bc9e-31554108e35d.jpeg',
                'source' => 'https://penajamkab.go.id/semarak-hut-ke-80-ri-pemkab-ppu-bagikan-4-200-bendera-merah-putih-kepada-warga/',
                'is_published' => 1,
                'published_at' => '2025-08-11 13:58:56',
                'tags' => 'tag1, tag2',
                'views' => 0,
                'likes' => 0,
                'comments_count' => 0,
                'status' => 'published',
                'meta_title' => NULL,
                'meta_description' => NULL,
                'meta_keywords' => NULL,
                'featured_image' => NULL,
                'created_at' => '2025-08-11 13:58:56',
                'updated_at' => '2025-08-11 13:58:56',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 'e2651a12-785a-4f43-9c93-7c330f352187',
                'title' => 'Berita Aja 22',
                'content' => '<p>Mudyatt Noor, S. H &amp; Waris Muin</p>',
                'slug' => 'berita-aja-22',
                'type' => 'pengumuman',
                'user_id' => 10,
                'image' => 'posts/3d0b150c-de41-4d97-8fd0-a849c67e4477.jpg',
                'source' => 'https://google.com',
                'is_published' => 1,
                'published_at' => '2025-08-11 13:53:29',
                'tags' => 'tag1, tag2',
                'views' => 0,
                'likes' => 0,
                'comments_count' => 0,
                'status' => 'published',
                'meta_title' => NULL,
                'meta_description' => NULL,
                'meta_keywords' => NULL,
                'featured_image' => NULL,
                'created_at' => '2025-08-11 13:40:46',
                'updated_at' => '2025-08-11 13:53:29',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}