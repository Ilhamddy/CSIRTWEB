<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
        ]);
        $this->call(PostsTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(VideosTableSeeder::class);
        $this->call(SlidersTableSeeder::class);
        $this->call(AgendasTableSeeder::class);
        $this->call(ProfilesTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(LayanansTableSeeder::class);
    }
}
