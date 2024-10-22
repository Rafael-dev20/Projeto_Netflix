<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'nome' => 'Rafael',
                'email' => 'rafa@gmail.com',
                'password' => bcrypt('kmdslkgnlek'),
                'dt_nascimento' => '1990-01-01',
                'plano' => 'Premium',
                'dt_inicio_plano' => now(),
                'fg_admin' => 1
            ],
            [
                'nome' => 'Usuario Padrão',
                'email' => 'user@example.com',
                'password' => bcrypt('password'),
                'dt_nascimento' => '1995-05-15',
                'plano' => 'Basic',
                'dt_inicio_plano' => now(),
                'fg_admin' => 0
            ],
            [
                'nome' => 'Maria Silva',
                'email' => 'maria.silva@example.com',
                'password' => bcrypt('password'),
                'dt_nascimento' => '1988-03-22',
                'plano' => 'Premium',
                'dt_inicio_plano' => now(),
                'fg_admin' => 0
            ],
            [
                'nome' => 'João Santos',
                'email' => 'joao.santos@example.com',
                'password' => bcrypt('password'),
                'dt_nascimento' => '1985-09-12',
                'plano' => 'Basic',
                'dt_inicio_plano' => now(),
                'fg_admin' => 0
            ],
        ]);
    }
}
