<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('categorias')->insert([
            ['name' => 'Filmes'],
            ['name' => 'Séries'],
            ['name' => 'Documentários'],
        ]);
    }
}
