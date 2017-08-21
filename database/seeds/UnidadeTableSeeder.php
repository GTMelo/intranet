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
        $unidades = [
            [
                'sigla' => 'S/N',
                'descricao' => 'Sem Unidade',
                'tldr' => 'O usuário ainda não possui uma unidade definida',
            ],
            [
                'sigla' => 'SAIN',
                'descricao' => 'Secretaria de Assuntos Internacionais',
                'tldr' => 'Some SAIN tldr here',
            ],
        ];

        foreach ($unidades as $unidade) {

            Unidade::create([
                'sigla' => $unidade['sigla'],
                'descricao' => $unidade['descricao'],
                'tldr' => $unidade['tldr'],
            ]);
        }


    }
}
