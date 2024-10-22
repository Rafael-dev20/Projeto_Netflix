<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Video;
use App\Models\obraAudioVisual;
use App\Models\Diretor;
use App\Models\Episodio;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            CategorySeeder::class,
            VideoSeeder::class,
            UserSeeder::class,
            DiretorSeeder::class,
            ObrasSeeder::class,
            EpisodiosSeeder::class,
        ]);
    }
}
