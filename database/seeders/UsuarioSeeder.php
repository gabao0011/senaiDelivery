<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                'nome' => 'Admin',
                'email' => 'admin@lanchonete.com',
                'telefone' => '999999999',
                'password' => 'password',
                'tipo' => User::TIPO_ADMIN
            ],
            [
                'nome' => 'Cliente',
                'email' => 'cliente@lanchonete.com',
                'telefone' => '199999999',
                'password' => 'password',
                'tipo' => User::TIPO_CLIENTE   
            ]
        );
    }
}
