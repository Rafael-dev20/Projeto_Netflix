<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ObrasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('obras_audiovisuais')->insert([
            [
                'titulo' => 'Inception',
                'descricao' => 'A thief who steals corporate secrets through the use of dream-sharing technology.',
                'ano_lancamento' => '2010-07-16',
                'capa' => 'inception.jpg',
                'idDiretor' => 1, // Presumindo que já tenha um diretor com ID 1
                'idCategoria' => 1, // Presumindo que já tenha uma categoria com ID 1
                'tipo' => 'Filme'
            ],
            [
                'titulo' => 'The Dark Knight',
                'descricao' => 'When the menace known as the Joker emerges from his mysterious past, he wreaks havoc on Gotham.',
                'ano_lancamento' => '2008-07-18',
                'capa' => 'dark_knight.jpg',
                'idDiretor' => 1, // Presumindo o mesmo diretor para ambos os filmes
                'idCategoria' => 2, // Presumindo uma categoria de ação com ID 2
                'tipo' => 'Filme'
            ],
            [
                'titulo' => 'Breaking Bad',
                'descricao' => 'A high school chemistry teacher turned methamphetamine producer.',
                'ano_lancamento' => '2008-01-20',
                'capa' => 'breaking_bad.jpg',
                'idDiretor' => 2, // Presumindo um diretor diferente com ID 2
                'idCategoria' => 3, // Presumindo uma categoria de drama com ID 3
                'tipo' => 'Serie'
            ],
            [
                'titulo' => 'Stranger Things',
                'descricao' => 'A group of kids uncovers mysteries in their small town related to a parallel dimension.',
                'ano_lancamento' => '2016-07-15',
                'capa' => 'stranger_things.jpg',
                'idDiretor' => 3, // Um outro diretor
                'idCategoria' => 3, // Presumindo a categoria de drama ou ficção científica
                'tipo' => 'Serie'
            ]
        ]);
    }
}
