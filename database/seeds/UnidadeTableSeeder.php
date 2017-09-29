<?php

use App\Models\Unidade;
use Illuminate\Database\Seeder;

class UnidadeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unidade::create([
            'sigla' => 'S/N',
            'descricao' => 'Sem Unidade',
            'tldr' => 'O usuário ainda não possui uma unidade definida',
        ]);

        Unidade::create([
            'sigla' => 'SAIN',
            'descricao' => 'Secretaria de Assuntos Internacionais',
            'tldr' => 'Some SAIN tldr here',
        ]);
    }
}
