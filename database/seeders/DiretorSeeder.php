<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class DiretorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('diretores')->insert([
            [
                'nome' => 'Christopher Nolan',
            ],
            [
                'nome' => 'Vince Gilligan',
            ],
            [
                'nome' => 'Duffer Brothers',
            ],
            [
                'nome' => 'Steven Spielberg',
            ],
            [
                'nome' => 'Quentin Tarantino',
            ],
        ]);
    }
}
