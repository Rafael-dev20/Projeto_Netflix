<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EpisodiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('episodios')->insert([
            // Episódios para a série com id 3
            [
                'temporada' => 1,
                'titulo' => 'O Começo',
                'descricao' => 'Os amigos descobrem algo sobrenatural em sua pequena cidade.',
                'duracao' => 45,
                'idObraAudiovisual' => 3, // Série com id 3
            ],
            [
                'temporada' => 1,
                'titulo' => 'Misterioso Desaparecimento',
                'descricao' => 'O grupo se une para buscar respostas enquanto eventos estranhos continuam.',
                'duracao' => 50,
                'idObraAudiovisual' => 3, // Série com id 3
            ],
            [
                'temporada' => 2,
                'titulo' => 'A Outra Dimensão',
                'descricao' => 'Eles descobrem uma conexão com uma dimensão paralela.',
                'duracao' => 55,
                'idObraAudiovisual' => 3, // Série com id 3
            ],

            // Episódios para a série com id 4
            [
                'temporada' => 1,
                'titulo' => 'A Nova Ameaça',
                'descricao' => 'Uma nova ameaça surge em um lugar inesperado.',
                'duracao' => 50,
                'idObraAudiovisual' => 4, // Série com id 4
            ],
            [
                'temporada' => 2,
                'titulo' => 'A Revolta',
                'descricao' => 'Os personagens enfrentam as consequências de suas ações.',
                'duracao' => 52,
                'idObraAudiovisual' => 4, // Série com id 4
            ]
        ]);
    }
}
