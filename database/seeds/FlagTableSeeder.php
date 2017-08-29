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
            'code' => 'personal',
            'display_name' => 'Pessoal',
            'description' => 'Item pertence a uma pessoa. Ex: e-mails pessoais, telefones residenciais, etc.',
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



    }
}
