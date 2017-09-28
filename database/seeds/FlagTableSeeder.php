<?php

use App\Models\Flag;
use Illuminate\Database\Seeder;

class FlagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Common flags
        Flag::create([
            'code' => 'is-personal',
            'display_name' => 'Pessoal',
            'description' => 'Item pertence a uma pessoa. Ex: e-mails pessoais, telefones residenciais, etc.',
        ]);
        Flag::create([
            'code' => 'is-work',
            'display_name' => 'Profissional',
            'description' => 'O item é relacionado ao exercício profissional de uma pessoa. Ex: e-mail profissiona, ramal, etc.',
        ]);

        // Phone flags
        Flag::create([
            'code' => 'is-landline',
            'display_name' => 'Telefone Fixo',
            'description' => 'O item é um telefone fixo',
        ]);
        Flag::create([
            'code' => 'is-cellphone',
            'display_name' => 'Telefone Celular',
            'description' => 'O item é um telefone celular',
        ]);

        // Location flags
        Flag::create([
            'code' => 'is-capital',
            'display_name' => 'Capital',
            'description' => 'A cidade é a capital ou uma das capitais do país.',
        ]);
        Flag::create([
            'code' => 'approval-pending',
            'display_name' => 'Aprovação Pendente',
            'description' => 'O usuário ainda precisa ser aprovado por um administrador de RH',
        ]);



    }
}
