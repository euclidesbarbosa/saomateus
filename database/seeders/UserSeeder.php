<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')
            ->insert([
                'name' => 'Euclides Barbosa Silva',
                'user_nome' => 'euclides',
                'email' => 'euclidesbarbosa@gmail.com',
                'password' => Hash::make('euclidestemp'),
                'user_tel' => '(98) 99193-1762',
                'tipo_perfil_id' => 1,
                'user_sta' => 1,
                'updated_at' => now(),
                'created_at' => now(),
            ]);

        DB::table('users')
            ->insert([
                'name' => 'Marcos Dyonny',
                'user_nome' => 'dyonny',
                'email' => 'dyonny@gmail.com',
                'password' => Hash::make('123mudar'),
                'user_tel' => '(98) 98401-0204',
                'tipo_perfil_id' => 1,
                'user_sta' => 1,
                'updated_at' => now(),
                'created_at' => now(),
            ]);

        DB::table('users')
            ->insert([
                'name' => 'USUARIO',
                'user_nome' => 'USUARIO',
                'email' => 'usuario@gmail.com',
                'password' => Hash::make('123mudar'),
                'user_tel' => '(98) 99999-9999',
                'tipo_perfil_id' => 4,
                'user_sta' => 1,
                'updated_at' => now(),
                'created_at' => now(),
            ]);

    }

}
