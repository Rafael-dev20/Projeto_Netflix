<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('videos')->insert([
            [
                'title' => 'O Poderoso Chefão',
                'description' => 'Um clássico filme de máfia.',
                'slug' => 'o-poderoso-chefao',
                'youtube_id' => 'sY1S34973zA', // Exemplo de ID do YouTube
                'image' => 'https://img.youtube.com/vi/sY1S34973zA/0.jpg',
                'featured' => true,
                'activated' => true,
            ],
            [
                'title' => 'Breaking Bad',
                'description' => 'Uma série sobre um professor que se torna um chefão das drogas.',
                'slug' => 'breaking-bad',
                'youtube_id' => 'HhesaQXLuRY', // Exemplo de ID do YouTube
                'image' => 'https://img.youtube.com/vi/HhesaQXLuRY/0.jpg',
                'featured' => false,
                'activated' => true,
            ],
            [
                'title' => 'Planeta Terra',
                'description' => 'Um documentário sobre a natureza do nosso planeta.',
                'slug' => 'planeta-terra',
                'youtube_id' => 'IhYROWOayLw', // Exemplo de ID do YouTube
                'image' => 'https://img.youtube.com/vi/IhYROWOayLw/0.jpg',
                'featured' => false,
                'activated' => true,
            ],
        ]);
    }
}
